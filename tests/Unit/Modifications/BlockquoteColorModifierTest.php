<?php

namespace Tests\Unit\Modifications;

use App\View\Modifications\BlockquoteColorModifier;
use PHPUnit\Framework\TestCase;

class BlockquoteColorModifierTest extends TestCase
{
    public function testItAddsCssClassesToBlockquoteTags(): void
    {
        $modifier = new BlockquoteColorModifier();

        $html = '
            <blockquote>{note} This is a note.</blockquote>
            <blockquote><strong>Warning</strong> This is a warning.</blockquote>
            <blockquote>{tip} This is a tip.</blockquote>
            <blockquote><strong>Note</strong> This is a note.</blockquote>
            <blockquote>[!WARNING] This is a warning.</blockquote>
            <blockquote>[!NOTE] This is a tip.</blockquote>
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
}
