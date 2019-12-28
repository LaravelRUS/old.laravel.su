<?php namespace App\Services;

use GrahamCampbell\Markdown\Facades\Markdown;

class DocsService
{
    public function __construct()
    {

    }

    public function convertToHtml(String $markdown, String $versionTitle) : String
    {
        $markdown = str_replace("{{version}}", $versionTitle, $markdown);
        $html = Markdown::convertToHtml($markdown);
        return $html;
    }
}
