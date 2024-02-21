<?php

namespace App\View\Components\Posts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hidden extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $text)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.posts.hidden');
    }

    /**
     * Determine if the component should be rendered.
     *
     * @return bool
     */
    public function shouldRender()
    {
        return ! empty($this->text);
    }
}
