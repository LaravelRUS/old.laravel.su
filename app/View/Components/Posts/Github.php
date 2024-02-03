<?php

namespace App\View\Components\Posts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
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

    /**
     * Determine if the component should be rendered.
     *
     * @return bool
     */
    public function shouldRender()
    {
        $validator = Validator::make([
            'link'        => $this->link,
            'title'       => $this->title,
            'description' => $this->description,
        ], [
            'link'        => 'required|url',
            'title'       => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
}
