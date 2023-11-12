<?php

namespace App\View\Components\Docs;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use JoliTypo\Fixer;
use Symfony\Component\DomCrawler\Crawler;

class Content extends Component implements Htmlable
{
    /**
     * @var string
     */
    protected $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @throws \DOMException
     *
     * @return \App\View\Components\DocsContent
     */
    public function render()
    {
        return $this;
    }

    /**
     * @param $contents
     *
     * @throws \DOMException
     *
     * @return string
     */
    private function modifyContent()
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent(mb_convert_encoding($this->content, 'UTF-8'));
        $this->content = $crawler->filterXpath('//body')->first()->html();

        $crawler->filter('blockquote')->each(function (Crawler $elm) {
            $tag = $elm->outerHtml();

            $html = $tag;

            collect([
                // docs-blockquote-note
                '{note}'                          => 'docs-blockquote-note', // for 8.x
                '<strong>Warning</strong>'        => 'docs-blockquote-note', // for 10.x
                '<strong>Предупреждение</strong>' => 'docs-blockquote-note',

                // docs-blockquote-tip
                '{tip}'                       => 'docs-blockquote-tip', // for 8.x
                '<strong>Note</strong>'       => 'docs-blockquote-tip', // for 10.x
                '<strong>Примечание</strong>' => 'docs-blockquote-tip', // for 10.x
            ])
                ->filter(fn(string $class, string $fragment) => Str::of($tag)->contains($fragment))
                ->each(function (string $class, string $fragment) use ($tag, &$html) {

                    $html = Str::of($tag)
                        ->replace('<blockquote>', '<blockquote class="' . $class . '">')
                        ->replace($fragment, '');
                });

            $this->content = Str::of($this->content)->replace($tag, $html);
        });



        $crawler->filter('x-docs-banner')->each(function (Crawler $elm) {
            $tag = $elm->outerHtml();

            $this->content = Str::of($this->content)
                ->replace($tag, Blade::render($tag));
        });

        $crawler->filter('h1')->each(function (Crawler $elm) {
            $tag = $elm->outerHtml();

            $this->content = Str::of($this->content)->replace($tag, '');
        });

        $crawler
            ->filter('h2,h3,h4,h5,h6')
            ->each(function (Crawler $elm) use (&$anchors) {

                /** @var \DOMElement $node */
                $node = $elm->getNode(0);

                $content = $node->textContent;
                $id = Str::slug($content);
                $tag = $node->nodeName;

                $this->content = Str::of($this->content)
                    ->replace($elm->outerHtml(), "<$tag><a href='#$id' id='$id'>$content</a></$tag>");
            });

        $crawler
            ->filter('img')
            ->each(function (Crawler $elm) use (&$anchors) {

                $imgTag = $elm->outerHtml();
                $alt = $elm->attr('alt');

                $this->content = Str::of($this->content)
                    ->replace($imgTag, "<picture alt='$alt'>$imgTag</picture>");
            });

        $fixer = new Fixer([
            'Ellipsis',
            'Dimension',
            'Unit',
            'Dash',
            'SmartQuotes',
            'NoSpaceBeforeComma',
            'CurlyQuote',
            'Trademark',
        ]);

        $crawler
            ->filter('p,liб,blockquote')
            ->each(function (Crawler $elm) use ($fixer) {

                $content = $elm->html();

                $paragraph = $fixer->fix($content);

                $this->content = Str::of($this->content)->replace($content, $paragraph);
            });

        return $this->content;
    }

    /**
     * @throws \DOMException
     *
     * @return string
     */
    public function toHtml(): string
    {
        return $this->modifyContent();
    }
}
