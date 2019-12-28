<?php

namespace App\Console\Commands;

use App\Documentation;
use App\FrameworkVersion;
use App\Services\GithubService;
use Arr;
use Carbon\Carbon;
use Github\Exception\RuntimeException;
use Illuminate\Console\Command;

class UpdateDocsCommand extends Command
{
    protected $signature = 'su:update_docs {force?} {--branch=} {--file=} {--pretend}';

    protected $description = 'Fetch translated documentation from github';
    /**
     * @var GithubService
     */
    private $githubTranslated;
    /**
     * @var GithubService
     */
    private $githubOriginal;

    public function __construct()
    {
        parent::__construct();

        $this->githubTranslated = new GithubService(
            config('laravelsu.translated_docs.user'),
            config('laravelsu.translated_docs.repository')
        );

        $this->githubOriginal = new GithubService(
            config('laravelsu.original_docs.user'),
            config('laravelsu.original_docs.repository')
        );
    }

    public function handle()
    {
        //Eloquent::unguard();
        //date_default_timezone_set('UTC');
        $this->info('su:update_docs begin');

        $updatedOriginalDocs = [];

        $forceUpdate = $this->argument('force');
        $forceBranch = $this->option('branch');
        $forceFile = $this->option('file');
        $isPretend = $this->option('pretend');

        if ($forceBranch) {
            $allFrameworkVersions[] = FrameworkVersion::query()->version($forceBranch)->first();
        } else {
            $allFrameworkVersions = FrameworkVersion::query()
                ->orderBy("id", "asc")
                ->get();
        }

        /** @var FrameworkVersion $v */
        foreach ($allFrameworkVersions as $v) {
            $id = $v->id;
            $version = $v->title;

            $this->info("Process branch $version");

            if ($forceFile) {
                if ($forceUpdate) {
                    Documentation::query()->byVersion($v)->page($forceFile)->delete();
                    $this->info("clear exist file $forceFile !");
                }

                $lines = ["[File](/docs/$version/$forceFile)"];
            } else {
                if ($forceUpdate) {
                    Documentation::query()->byVersion($v)->delete();
                    $this->info("clear exist {$version} docs!");
                }

                $this->line('Fetch documentation menu');

                // В случае ошибки при получении документации продолжить цикл.
                try {
                    $content = $this->githubTranslated->getFile($version, 'documentation.md');
                } catch (RuntimeException $e) {
                    continue;
                }

                $lines = explode("\n", $content);
                $lines[] = "[Menu](/docs/$version/documentation)";
            }

            $matches = [];
            foreach ($lines as $line) {
                try {
                    preg_match('/\(\/docs\/(.*?)\/(.*?)\)/im', $line, $matches);

                    if (isset($matches[2])) {
                        $name = $matches[2];
                        $filename = $name . '.md';
                        $this->line('');
                        $this->line("Fetch {$filename}...");
                        $this->line(' get last translated commit');
                        $commit = $this->githubTranslated->getLastCommit($version, $filename);

                        if (!is_null($commit)) {
                            $last_commit_id = $commit['sha'];
                            $last_commit_at = Carbon::createFromTimestampUTC(
                                strtotime($commit['commit']['committer']['date'])
                            );
                            $this->line(' get file');
                            $content = $this->githubTranslated->getFile($version, $filename, $last_commit_id);
                            if (!is_null($content)) {
                                preg_match('/git (.*?)$/m', $content, $matches);
                                $last_original_commit_id = Arr::get($matches, '1');
                                if( ! $last_original_commit_id){
                                    $this->error("Wrong format. Missing git xxxxxxxx - last commit id in original repo");
                                }


                                $this->line(" get last translated original commit $last_original_commit_id");
                                $count_ahead = 0;
                                try {
                                    $original_commit = $this->githubOriginal->getCommit($last_original_commit_id);
                                    $current_original_commit = "";
                                    $last_original_commit_at = Carbon::createFromTimestampUTC(strtotime($original_commit['commit']['committer']['date']));

                                    // Считаем сколько коммитов прошло с момента перевода
                                    $this->line(' get current original commit');
                                    $after_last_original_commit_at = $last_original_commit_at;
                                    $after_last_original_commit_at = $after_last_original_commit_at->addSecond();
                                    $original_commits = $this->githubOriginal->getCommits($version, $filename, $after_last_original_commit_at);
                                    $count_ahead = count($original_commits);
                                    $current_original_commit = $this->githubOriginal->getLastCommit($version, $filename);
                                    $current_original_commit_id = $current_original_commit['sha'];
                                    $current_original_commit_at = Carbon::createFromTimestampUTC(
                                        strtotime(
                                            $current_original_commit['commit']['committer']['date']
                                        )
                                    );

                                } catch (RuntimeException $e) {
                                    // Оригинальный файл не найден
                                    $last_original_commit_at = null;
                                    $current_original_commit_id = "";
                                    $current_original_commit_at = null;
                                }


                                $content = preg_replace('/git(.*?)(\n*?)---(\n*?)/', "", $content);
                                preg_match('/#(.*?)$/m', $content, $matches);
                                $title = trim(Arr::get($matches, '1'));
                                $page = Documentation::query()->byVersion($v)->page($name)->first();
                                if ($page) {
                                    if ($current_original_commit_id != $page->current_original_commit) {
                                        // Обновилась оригинальная дока
                                        $page->current_original_commit = $current_original_commit_id;
                                        $page->current_original_commit_at = $current_original_commit_at;
                                        $page->original_commits_ahead = $count_ahead;
                                        if (!$isPretend) {
                                            $page->save();
                                        }
                                        $this->info("Detected changes in original $version/$filename - commit $current_original_commit_id. Requires new translation.");
                                        $updatedOriginalDocs[] = ['name' => "$version/$filename", 'commit' => $current_original_commit_id];
                                    }

                                    if ($last_commit_id != $page->last_commit) {
                                        // Обновился перевод
                                        $page->last_commit = $last_commit_id;
                                        $page->last_commit_at = $last_commit_at;
                                        $page->last_original_commit = $last_original_commit_id;
                                        $page->last_original_commit_at = $last_original_commit_at;
                                        $page->original_commits_ahead = $count_ahead;
                                        $page->title = $title;
                                        $page->text = $content;
                                        if (!$isPretend) {
                                            $page->save();
                                        }
                                        $this->info("$version/$filename updated. Commit $last_commit_id. Last original commit $last_original_commit_id.");
                                    }
                                } else {
                                    if (!$isPretend) {
                                        Documentation::create([
                                            'version_id' => $id,
                                            'page' => $name,
                                            'title' => $title,
                                            'last_commit' => $last_commit_id,
                                            'last_commit_at' => $last_commit_at,
                                            'last_original_commit' => $last_original_commit_id,
                                            'last_original_commit_at' => $last_original_commit_at,
                                            'current_original_commit' => $current_original_commit_id,
                                            'current_original_commit_at' => $current_original_commit_at,
                                            'original_commits_ahead' => $count_ahead,
                                            'text' => $content
                                        ]);
                                    }

                                    $this->info("Translate for $version/$filename created, commit id=$last_commit_id. Translated from original commit id=$last_original_commit_id.");
                                }

                            }
                        }
                    }
                } catch (RuntimeException $e) {
                    $this->error('su:update_docs \Github\Exception\RuntimeException ' . $e->getMessage());
                    die();
                }
            }
        }

        $this->info('su:update_docs   end');
    }
}
