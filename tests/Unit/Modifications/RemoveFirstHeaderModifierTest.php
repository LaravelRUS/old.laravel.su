<?php

namespace Tests\Unit\Modifications;

use App\View\Modifications\RemoveFirstHeaderModifier;
use PHPUnit\Framework\TestCase;

class RemoveFirstHeaderModifierTest extends TestCase
{
    public function testItRemovesFirstHeaderFromHtmlContent(): void
    {
        $modifier = new RemoveFirstHeaderModifier();

        $html = '<h1>First Header</h1><p>This is some text.</p>';

        $modifiedHtml = $modifier->handle($html, function ($content) {
            return $content;
        });

        $this->assertStringNotContainsString('<h1>First Header</h1>', $modifiedHtml);
    }
}
