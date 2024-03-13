<?php

namespace Tests\Unit\Modifications;

use App\View\Modifications\ResponsiveTableModifier;
use PHPUnit\Framework\TestCase;

class ResponsiveTableModifierTest extends TestCase
{
    public function testItWrapsTableTagsInResponsiveDiv(): void
    {
        $modifier = new ResponsiveTableModifier();

        $html = '<table><tr><td>Cell 1</td><td>Cell 2</td></tr></table>';

        $modifiedHtml = $modifier->handle($html, function ($content) {
            return $content;
        });

        $expectedResult = '<div class="table-responsive mb-3"><table><tr><td>Cell 1</td><td>Cell 2</td></tr></table></div>';
        $this->assertEquals($expectedResult, $modifiedHtml);
    }
}
