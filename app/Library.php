<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

class Library
{
    private string $content;
    private array $variables = [];

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $raw = Storage::disk('library')->get($name.'.md');

        $variables = Str::of($raw)->betweenFirst('---', '---');

        try {
            $this->variables = Yaml::parse($variables);
        } catch (\Throwable) {

        }

        $this->content = Str::of($raw)
            ->after('---')
            ->after('---')
            ->markdown()
            ->toString();
    }

    /**
     * Get the title from variables
     *
     * @return string
     */
    public function title(): string
    {
        return $this->variables['title'] ?? '';
    }

    /**
     * Get the description from variables
     *
     * @return string
     */
    public function description(): string
    {
        return $this->variables['description'] ?? '';
    }

    /**
     * Get the content
     *
     * @return string
     */
    public function content(): string
    {
        return $this->content;
    }

    /**
     * Get the slug from title variables
     *
     * @return string
     */
    public function slug(): string
    {
        return Str::of($this->variables['title'] ?? '')->slug()->toString();
    }
}
