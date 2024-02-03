<?php

namespace App\View\Components\Posts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Component;

class Youtube extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $link)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts.youtube');
    }

    /**
     * Determine if the component should be rendered.
     *
     * @return bool
     */
    public function shouldRender()
    {
        $validator = Validator::make([
            'link'        => $this->link,
        ], [
            'link'        => 'required|url',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
}
