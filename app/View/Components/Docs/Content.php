<?php

namespace App\View\Components\Docs;

use App\View\Modifications\BladeComponentModifier;
use App\View\Modifications\BlockquoteColorModifier;
use App\View\Modifications\HeaderLinksModifier;
use App\View\Modifications\HTMLCleanseModifier;
use App\View\Modifications\ImageAltModifier;
use App\View\Modifications\RemoveFirstHeaderModifier;
use App\View\Modifications\ResponsiveTableModifier;
use App\View\Modifications\TypografModifier;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Content extends Component implements Htmlable
{
    /**
     * @var string
     */
    protected $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @throws \DOMException
     *
     * @return \App\View\Components\DocsContent
     */
    public function render()
    {
        return $this;
    }

    /**
     * @return string
     */
    public function toHtml(): string
    {
        return Cache::remember('doc-content-'.sha1($this->content), now()->addWeek(), function () {
            return app(Pipeline::class)
                ->send($this->content)
                ->through([
                    HTMLCleanseModifier::class, // Стандартизирует HTML
                    BlockquoteColorModifier::class, // Применяет цвет к блокам цитат (Например предупреждение)
                    RemoveFirstHeaderModifier::class, // Удаляет h1 заголовок
                    HeaderLinksModifier::class, // Добавляет ссылки для заголовков
                    ResponsiveTableModifier::class, // Добавляет к таблице класс table-responsive
                    BladeComponentModifier::class, // Применяет компоненты blade
                    ImageAltModifier::class, // Добавляет alt к картинкам
                    TypografModifier::class, // Применяет типограф к тексту
                ])
                ->thenReturn();
        });
    }
}
