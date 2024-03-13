<?php

namespace Tests\Unit\Modifications;

use App\View\Modifications\ImageAltModifier;
use PHPUnit\Framework\TestCase;

class ImageAltModifierTest extends TestCase
{
    public function testItAddsAltAttributeToImageTagsWithEmptyAlt(): void
    {
        $modifier = new ImageAltModifier();

        $html = '<img src="image.jpg">';

        // Вызываем метод handle() для модификации HTML-контента
        $modifiedHtml = $modifier->handle($html, function ($content) {
            return $content;
        });

        $expectedResult = '<picture alt=""><img src="image.jpg"></picture>';
        $this->assertEquals($expectedResult, $modifiedHtml);
    }

    public function testItDoesNotChangeImageTagsWithNonEmptyAlt(): void
    {
        $modifier = new ImageAltModifier();

        $html = '<img src="image.jpg" alt="Example alt text">';

        $modifiedHtml = $modifier->handle($html, function ($content) {
            return $content;
        });

        $expectedResult = '<picture alt="Example alt text"><img src="image.jpg" alt="Example alt text"></picture>';
        $this->assertEquals($expectedResult, $modifiedHtml);
    }
}
