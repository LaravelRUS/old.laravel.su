<?php

namespace App\View\Components\Docs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Banner extends Component
{
    public string $title;
    public string $image;
    public string $href;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $banner = collect([
            [
                'title' => 'Поделитесь своим кодом и идеями!',
                'image' => asset('/img/ui/doc-banners/pastebin.svg'),
                'href'  => route('pastebin'),
            ],
            [
                'title' => 'Поддержите нас - каждый вклад важен!',
                'image' => asset('/img/ui/doc-banners/donate.svg'),
                'href'  => route('donate'),
            ],
            [
                'title' => 'Будьте в курсе последних новостей!',
                'image' => asset('/img/ui/doc-banners/feed.svg'),
                'href'  => route('feed'),
            ],
            [
                'title' => 'Ищете работу? Мы поможем!',
                'image' => asset('/img/ui/doc-banners/jobs.svg'),
                'href'  => route('jobs'),
            ],
            [
                'title' => 'Примите наш вызов и улучшите свои навыки!',
                'image' => asset('/img/ui/doc-banners/challenges.svg'),
                'href'  => route('challenges'),
            ],
        ])->random();

        $this->title = $banner['title'];
        $this->image = $banner['image'];
        $this->href = $banner['href'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.docs.banner');
    }
}
