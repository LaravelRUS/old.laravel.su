<?php

namespace App\Orchid\Screens\Position;

use App\Models\Position;
use App\Notifications\SimpleMessageNotification;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\Boolean;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'positions' => Position::with('author')
                ->filters()
                ->defaultSort('approved')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Вакансии';
    }

    /**
     * A description of the screen to be displayed in the header.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return '';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    public function permission(): ?iterable
    {
        return [
            'site.content',
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @throws \ReflectionException
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('positions', [

                TD::make('title', 'Заголовок')
                    ->width(350)
                    ->sort()
                    ->cantHide()
                    ->render(function (Position $position) {
                        return "<strong class='d-block'>".e($position->title)."</strong>
                                <p class='text-muted'>".Str::of($position->description)->markdown()->stripTags()->words(20).'</p>';
                    })->filter(Input::make()),

                TD::make('organization', 'Организвция')
                    ->width(200)
                    ->sort()
                    ->cantHide()
                    ->filter(Input::make()),

                TD::make('location', 'Локация')
                    ->width(150)
                    ->sort()
                    ->cantHide()
                    ->filter(Input::make()),

                TD::make('approved', 'Статус')
                    ->width(130)
                    ->usingComponent(Boolean::class, true: ' Утвержден', false: ' Ожидает')
                    ->sort(),

                TD::make('Добавил')
                    ->cantHide()
                    ->render(fn (Position $position) => new Persona($position->author->presenter())),

                TD::make('created_at', __('Created'))
                    ->usingComponent(DateTimeSplit::class)
                    ->align(TD::ALIGN_RIGHT)
                    ->defaultHidden()
                    ->sort(),

                TD::make('updated_at', 'Последнее обновление')
                    ->defaultHidden()
                    ->usingComponent(DateTimeSplit::class)
                    ->align(TD::ALIGN_RIGHT)
                    ->sort(),

                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(fn (Position $position) => DropDown::make()
                        ->icon('bs.three-dots-vertical')
                        ->list([
                            Link::make('Посмотреть на сайте')
                                ->href(route('position.show', $position))
                                ->target('_blank')
                                ->icon('bs.eye'),

                            Link::make(__('Edit'))
                                ->route('platform.position.edit', $position->id)
                                ->icon('bs.pencil'),

                            Button::make(__('Delete'))
                                ->icon('bs.trash3')
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->method('remove', [
                                    'position' => $position->id,
                                ]),
                        ])),
            ]),

        ];
    }

    /**
     * @param Position $position
     *
     * @return void
     */
    public function remove(Position $position): void
    {
        $position->delete();

        $position->author->notify(new SimpleMessageNotification('Вакансия "'.$position->title.'" отклонена.'));

        Toast::info('Вакансия удалена');
    }
}
