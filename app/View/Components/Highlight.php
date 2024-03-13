<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

class Highlight extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected $language = 'php')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return function (array $variables) {
            return Blade::render('<pre class="rounded-3 my-0"><code {{ $attributes }}>{{ \Illuminate\Support\Str::of($slot)->trim() }}</code></pre>', $variables);
        };
    }
}
