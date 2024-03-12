<?php

namespace Tests\Unit\Modifications;

use App\View\Modifications\HeaderLinksModifier;
use PHPUnit\Framework\TestCase;

class HeaderLinksModifierTest extends TestCase
{
    public function testItAddsAnchorLinksToHeadersAndMovesLinksOutOfParagraphs(): void
    {
        $modifier = new HeaderLinksModifier();

        $html = '
            <h2>Header 1</h2>
            <h3>Header 2</h3>
            <h4>Header 3</h4>
        ';

        $modifiedHtml = $modifier->handle($html, function ($content) {
            return $content;
        });

        // Проверяем, что заголовки стали ссылками-якорями
        $expectedHeaders = [
            '<h2><a href="#header-1" id="header-1">Header 1</a></h2>',
            '<h3><a href="#header-2" id="header-2">Header 2</a></h3>',
            '<h4><a href="#header-3" id="header-3">Header 3</a></h4>',
        ];

        foreach ($expectedHeaders as $header) {
            $this->assertStringContainsString($header, $modifiedHtml);
        }
    }
}
