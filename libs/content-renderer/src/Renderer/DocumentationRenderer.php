<?php

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Extension\ImportHeaderClasses;
use App\ContentRenderer\Extension\NormalizeAnchors;
use App\ContentRenderer\Extension\QuotesFormatter;
use App\ContentRenderer\Extension\RemoveEmptyParagraphs;
use App\ContentRenderer\Extension\RemoveStyleTags;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Util\HtmlFilter;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class DocumentationRenderer extends Renderer
{
    public function __construct()
    {
        parent::__construct(['html_input' => HtmlFilter::ALLOW]);

        $this->env->addExtension(new ImportHeaderClasses());
        $this->env->addExtension(new QuotesFormatter());
        $this->env->addExtension(new RemoveEmptyParagraphs());
        $this->env->addExtension(new NormalizeAnchors());
        $this->env->addExtension(new RemoveStyleTags());

        $this->env->addRenderer(FencedCode::class, new FencedCodeRenderer(['php', 'html']));
        $this->env->addRenderer(IndentedCode::class, new IndentedCodeRenderer(['php', 'html']));
    }
}
