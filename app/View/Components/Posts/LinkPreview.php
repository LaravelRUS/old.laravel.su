<?php

namespace App\View\Components\Posts;

use App\MetaParser;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class LinkPreview extends Component
{
    public string|null $title;
    public string|null $description;
    public string|null $image;
    public string $link;

    /**
     * Create a new component instance.
     */
    public function __construct(string $link)
    {
        $html = Http::timeout(30)->get($link)->body();

        $parse = new MetaParser($html, $link);

        $this->link = $link;
        $this->title = $parse->title();
        $this->description = $parse->description();
        $this->image = $parse->image();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts.link-preview');
    }
}
