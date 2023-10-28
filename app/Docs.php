<?php

namespace App;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Yaml\Yaml;

class Docs
{
    public const DEFAULT_VERSION = '8.x';

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $variables = [];

    /**
     * @var string
     */
    protected $page;

    /**
     * @param string $version
     * @param string $path
     */
    public function __construct(string $version, string $path)
    {
        $this->version = $version;
        $this->path = "/$version/$path.md";

        $this->page = Storage::disk('docs')->get($this->path);

        abort_if($this->page === null, 404);

        $variables = Str::of($this->page)->after('---')->before('---');
        $this->variables = Yaml::parse($variables);
    }

    /**
     * @param string $view
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function view(string $view)
    {
        $content = Str::of($this->page)->after('---')->after('---')->markdown();

        $all = collect()->merge($this->variables)->merge([
            'content' => $content,
            'edit'    => $this->editLinkGitHub(),
        ]);

        return view($view, $all);
    }

    /**
     * Get the documentation index page.
     *
     * @return array
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
     * @return string|null
     */
    public function title()
    {
        $title = (new Crawler(Str::of($this->page)->markdown()))->filterXPath('//h1');

        return count($title) ? $title->text() : null;
    }

    /**
     * @param string $html
     *
     * @return array
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
                'href'  => $subNode->filter('a')->attr('href'),
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
     * @return string
     */
    public function editLinkGitHub(): string
    {
        return "https://github.com/laravelRus/docs/edit/$this->path";
    }

    public function goToOriginal(): string
    {
        $urlPart = Str::of($this->path)->remove('.md');

        return "https://laravel.com/docs$urlPart";
    }
}
