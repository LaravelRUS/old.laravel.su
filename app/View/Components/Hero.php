<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public string $image;
    public string $text;

    /**
     * Create a new component instance.
     */
    public function __construct(string $text = '')
    {
        $number = random_int(1, 6);
        $this->image = 'https://moodmentor.dev/img/hero/'.$number.'.jpg';
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero', [
            'image' => $this->image,
            'text'  => $this->text,
        ]);
    }
}
