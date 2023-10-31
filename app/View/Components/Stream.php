<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Stream extends Component
{
    /**
     * @var bool
     */
    protected bool $when = true;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $when = true)
    {
        $this->when = $when;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stream');
    }

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return $this->when;
    }
}
