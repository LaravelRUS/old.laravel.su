<?php

namespace App\View\Components\Posts;

use App\MetaParser;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Component;

class LinkPreview extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $link)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return Cache::remember('preview-'.sha1($this->link), now()->addWeek(), function () {

            $html = Http::timeout(30)->get($this->link)->body();

            $parse = new MetaParser($html, $this->link);

            return view('components.posts.link-preview', [
                'link'        => $this->link,
                'title'       => $parse->title(),
                'description' => $parse->description(),
                'image'       => $parse->image(),
            ])->render();
        });
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
