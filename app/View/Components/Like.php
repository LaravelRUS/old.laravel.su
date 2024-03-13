<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Like extends Component
{
    protected Model $model;
    private string $route;

    /**
     * Create a new component instance.
     */
    public function __construct($model)
    {
        if ($model->likers_count === null) {
            $model->loadCount('likers');
        }

        if ($model->has_liked === null) {
            auth()->user()?->attachLikeStatus($model);
        }

        $this->model = $model;
        $this->route = $model instanceof Post ? 'like.post' : 'like.comment';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.like', [
            'model' => $this->model,
            'route' => $this->route,
        ]);
    }
}
