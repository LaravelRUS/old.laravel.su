<?php

namespace Tests\Unit\Modifications;

use App\View\Modifications\BlockquoteModifier;
use PHPUnit\Framework\TestCase;

class BlockquoteModifierTest extends TestCase
{
    public function testItAddsCssClassesToBlockquoteTags(): void
    {
        $modifier = new BlockquoteModifier();

        $html = '
            <blockquote>{note} This is a note.</blockquote>
            <blockquote><strong>Warning</strong> This is a warning.</blockquote>
            <blockquote>{tip} This is a tip.</blockquote>
            <blockquote><strong>Note</strong> This is a note.</blockquote>
            <blockquote>[!WARNING] This is a warning.</blockquote>
            <blockquote>[!NOTE] This is a tip.</blockquote>
            <blockquote><p><br>Более подробную документацию по использованию Vite с Laravel можно найти в нашей <a href="/docs/10.x/vite"> специализированной документации по сборке и компиляции ваших ресурсов.</a>.</p></blockquote>
        ';

        $modifiedHtml = $modifier->handle($html, function ($content) {
            return $content;
        });

        $expectedResult = '
            <blockquote class="docs-blockquote-note"><div> This is a note.</div></blockquote>
            <blockquote class="docs-blockquote-note"><div> This is a warning.</div></blockquote>
            <blockquote class="docs-blockquote-tip"><div> This is a tip.</div></blockquote>
            <blockquote class="docs-blockquote-tip"><div> This is a note.</div></blockquote>
            <blockquote class="docs-blockquote-note"><div> This is a warning.</div></blockquote>
            <blockquote class="docs-blockquote-tip"><div> This is a tip.</div></blockquote>
        ';

        // Удаляем лишние пробелы и символы новой строки для лучшего сравнения
        $expectedResult = preg_replace('/\s+/', '', $expectedResult);
        $modifiedHtml = preg_replace('/\s+/', '', $modifiedHtml);

        $this->assertEquals($expectedResult, $modifiedHtml);
    }

    public function testItPreservesBrTagsInBlockquotes(): void
    {
        $modifier = new BlockquoteModifier();

        $html = '
            <blockquote>
            <p>
            <br>
                Более подробную документацию по использованию Vite с Laravel можно найти в нашей <a href="/docs/10.x/vite">
                специализированной документации по сборке и компиляции ваших ресурсов.</a>.
            </p>
            </blockquote>
        ';

        $modifiedHtml = $modifier->handle($html, function ($content) {
            return $content;
        });

        $expectedResult = '
            <blockquote>
            <p>
                Более подробную документацию по использованию Vite с Laravel можно найти в нашей <a href="/docs/10.x/vite">
                <br/>специализированной документации по сборке и компиляции ваших ресурсов.</a>.
            </p>
            </blockquote>
        ';

        $expectedResult = preg_replace('/\s+/', '', $expectedResult);
        $modifiedHtml = preg_replace('/\s+/', '', $modifiedHtml);

        $this->assertEquals($expectedResult, $modifiedHtml);
    }
}
