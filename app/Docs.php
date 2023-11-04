<?php

namespace App;

use App\Models\Document;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Yaml\Yaml;

class Docs
{
    /**
     * Default version of Laravel documentation
     */
    public const DEFAULT_VERSION = '8.x';

    /**
     * Array of supported versions
     */
    public const SUPPORT_VERSION = [
        '8.x',
    ];

    /**
     * @var string The version of the documentation.
     */
    public $version;

    /**
     * @var string The path to the Markdown file.
     */
    protected $path;

    /**
     * @var array The array of variables extracted from the Markdown file's front matter.
     */
    protected array $variables = [];

    /**
     * @var string The content of the Markdown file.
     */
    protected $page;

    /**
     * @var string The file name.
     */
    public string $file;

    /**
     * @var Document
     */
    protected $model;

    /**
     * Create a new Docs instance.
     *
     * @param string $version The version of the Laravel documentation.
     * @param string $file    The file name.
     */
    public function __construct(string $version, string $file)
    {
        $this->file = $file . '.md';
        $this->version = $version;
        $this->path = "/$version/$this->file";

        $this->page = Storage::disk('docs')->get($this->path);

        // Abort the request if the page doesn't exist
        abort_if($this->page === null, 404);

        $variables = Str::of($this->page)->after('---')->before('---');

        try {
            $this->variables = Yaml::parse($variables);
        } catch (\Throwable) {
        }
    }

    /**
     * Get the rendered view of a documentation page.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function view(string $viewName): View
    {
        $content = Str::of($this->page)
            ->replace('{{version}}', $this->version)
            ->replace('{note}', '⚠️')
            ->replace('{tip}', '💡️')
            ->after('---')
            ->after('---')
            ->markdown();

        $all = collect()->merge($this->variables)->merge([
            'content' => $content,
            'edit'    => $this->goToGitHub(),
        ]);

        return view($viewName, $all);
    }

    /**
     * Get the menu array for the documentation index page.
     *
     * @return array The menu array.
     */
    public function getMenu(): array
    {
        $page = Storage::disk('docs')->get($this->version . '/documentation.md');

        $html = Str::of($page)
            ->after('---')
            ->after('---')
            ->replace('{{version}}', $this->version)
            ->markdown()->toString();

        return $this->docsToArray($html);
    }

    /**
     * Get the title of the documentation page.
     *
     * @return string|null The title of the documentation page.
     */
    public function title(): ?string
    {
        $title = (new Crawler(Str::of($this->page)->markdown()))->filterXPath('//h1');

        return count($title) ? $title->text() : null;
    }

    /**
     * Convert the HTML string to an array.
     *
     * @param string $html The HTML string.
     *
     * @return array The converted array.
     */
    public function docsToArray(string $html): array
    {
        $crawler = new Crawler();
        $crawler->addContent($html);

        $crawler = new Crawler($html);

        $menu = [];

        $crawler->filter('ul > li')->each(function (Crawler $node) use (&$menu) {
            $subList = $node->filter('ul > li')->each(fn(Crawler $subNode) => [
                'title' => $subNode->filter('a')->text(),
                'href'  => url($subNode->filter('a')->attr('href')),
            ]);

            if (empty($subList)) {
                return null;
            }

            $menu[] = [
                'title' => $node->filter('h2')->text(),
                'list'  => $subList,
            ];
        });

        return $menu;
    }

    /**
     * Get all the versions of the documentation.
     *
     * @param string $version The version of the Laravel documentation.
     *
     * @return Collection<int, Docs> A collection of Docs instances.
     */
    public static function every(string $version): Collection
    {
        $files = Storage::disk('docs')->allFiles($version);

        return collect($files)
            ->filter(fn(string $path) => Str::of($path)->endsWith('.md'))
            ->filter(fn(string $path) => !Str::of($path)->endsWith(['readme.md', 'license.md']))
            ->map(fn(string $path) => Str::of($path)->after($version . '/')->before('.md'))
            ->map(fn(string $path) => new static($version, $path));
    }

    public function countCommitsBehindCurrent(): int
    {
        throw_unless(isset($this->variables['git']), new Exception("Document {$this->path} does not have a git hash"));

        $response = Http::withBasicAuth('token', config('services.github.token'))
            ->get("https://api.github.com/repos/laravel/docs/commits?sha={$this->version}&path={$this->file}");

        return $response->collect()
            ->takeUntil(fn($commit) => $commit['sha'] === $this->variables['git'])
            ->count();
    }

    /**
     * Get the URL to edit the page on GitHub.
     *
     * @return string The URL to edit the page on GitHub.
     */
    public function goToGitHub(): string
    {
        return "https://github.com/laravelRus/docs/edit/$this->path";
    }

    /**
     * Get the URL to the original Laravel documentation page.
     *
     * @return string The URL to the original Laravel documentation page.
     */
    public function goToOriginal(): string
    {
        $urlPart = Str::of($this->path)->remove('.md');

        return "https://laravel.com/docs$urlPart";
    }

    /**
     * @param string $version
     * @param string $hash
     *
     * @return string
     */
    public static function compareLink(string $version, string $hash): string
    {
        $compactHash = Str::of($hash)->limit(7, '')->toString();

        return "https://github.com/laravel/docs/compare/$version..$compactHash";
    }

    /**
     * Get the Document model for the documentation page.
     *
     * @return Document The Document model.
     */
    public function getModel(): Document
    {
        if ($this->model === null) {
            $this->model = Document::firstOrNew([
                'version' => $this->version,
                'file'    => $this->file,
            ]);
        }

        return $this->model;
    }

    public function countCommitsBehind(): int
    {
        return $this->getModel()->count_commits_behind;
    }


    public function translationIsLagsBehind(): bool
    {
        return $this->getModel()->count_commits_behind > 0;
    }

    public function isOlderVersion(): bool
    {
        return $this->version !== static::DEFAULT_VERSION;
    }

    /**
     * Update the Document model with the latest information.
     *
     * @return void
     */
    public function update()
    {
        $this->getModel()->fill([
            'count_commits_behind' => $this->countCommitsBehindCurrent(),
            'current_commit' => $this->variables['git'],
        ])->save();
    }
}
