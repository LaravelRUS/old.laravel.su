<?php

namespace App\View\Modifications;

use Illuminate\Support\Facades\Process;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Symfony\Component\DomCrawler\Crawler;

class HighlightModifier extends HTMLModifier
{
    /**
     * @param string   $content The HTML content to be modified.
     * @param \Closure $next    The next method in the middleware pipeline.
     *
     * @return mixed The modified HTML content.
     */
    public function handle(string $content, \Closure $next)
    {
        return $next($content);

        \Highlight\Highlighter::registerLanguage('blade', resource_path('syntax/blade.json'), false);
        \Highlight\Highlighter::registerLanguage('vue', resource_path('syntax/vue.json'), false);

        // Highlight some code.
        $hl = new \Highlight\Highlighter();

        $this->crawler($content)
            ->filter('pre code')
            ->each(function (Crawler $elm) use (&$content, $hl) {
                ;
                /** @var \DOMElement $node */
                $node = $elm->getNode(0);


                $language = Str::of($node->getAttribute('class'))
                    ->after('language-')->toString() ?? 'php';


                $codeStatus = null;
                $codeDirection = null;


                $process = Process::run("shiki --lang=php --theme=github-light --code=$node->textContent.");


                $test = $process->output();

                dd($process, $test);

                $test = \Spatie\ShikiPhp\Shiki::highlight(
                    code: $node->textContent,
                    language: $language,
                    theme: 'github-light',
                );

                dd($test);


                $code = Str::of($node->textContent)->explode(PHP_EOL)
                    //->map(fn(string $part) => $hl->highlight($language, $code))
                    ->map(fn(string $part) => Str::of($part))
                    ->map(function (Stringable $part) use ($hl, $language) {

                        $addLine = ['// [tl! ++]', '// [tl! add]'];
                        if ($part->endsWith($addLine)) {
                            $partWithoutLine = $part->replace($addLine, '');
                            return "<div class='line line-add'>$partWithoutLine</div>";
                        }

                        $removeLine = ['// [tl! --]', '// [tl! remove]'];
                        if ($part->endsWith($removeLine)) {
                            $partWithoutLine = $part->replace($removeLine, '');
                            return "<div class='line line-remove'>$partWithoutLine</div>";
                        }


                        $highlighted = $hl->highlightAuto($part->toString(), [$language, 'php']);

                        //$highlighted = $hl->highlight($language, $part->toString());

                        return $highlighted->value;
                    })->implode(PHP_EOL);


                try {
                    $content = Str::of($content)->replace($elm->outerHtml(), "<code class=".$language.">".$code.'</code>');
                } catch (\Throwable $e) {

                }
            });

        return $next($content);
    }
}
