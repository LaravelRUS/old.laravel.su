<?php

namespace App\View\Components\Posts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Github extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $link, public string $title, public $description = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts.github');
    }
}
