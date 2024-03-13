<?php

namespace App\Orchid\Screens\Post;

use App\Models\Post;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
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
            'posts' => Post::with('author')
                ->filters()
                ->defaultSort('created_at', 'desc')
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
        return 'Лента постов';
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
            Layout::table('posts', [

                TD::make('title', 'Заголовок')
                    ->width(200)
                    ->sort()
                    ->cantHide()
                    ->render(function (Post $post) {
                        return "<strong class='d-block'>".e($post->title).'</strong>';
                    })->filter(Input::make()),

                TD::make('content', 'Содержимое')
                    ->width(400)
                    ->cantHide()
                    ->render(function (Post $post) {
                        return Str::of($post->content)->markdown()->stripTags()->words(20);
                    })->filter(Input::make()),

                TD::make('Добавил')
                    ->cantHide()
                    ->render(fn (Post $post) => new Persona($post->author->presenter())),

                TD::make('created_at', __('Created'))
                    ->usingComponent(DateTimeSplit::class)
                    ->align(TD::ALIGN_RIGHT)
                    ->defaultHidden()
                    ->sort(),

                TD::make('updated_at', 'Последнее обновление')
                    ->usingComponent(DateTimeSplit::class)
                    ->align(TD::ALIGN_RIGHT)
                    ->sort(),

                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(fn (Post $post) => DropDown::make()
                        ->icon('bs.three-dots-vertical')
                        ->list([
                            Link::make('Посмотреть на сайте')
                                ->href(route('post.show', $post))
                                ->target('_blank')
                                ->icon('bs.eye'),

                            Link::make(__('Edit'))
                                ->route('platform.post.edit', $post->id)
                                ->icon('bs.pencil'),

                            Button::make(__('Delete'))
                                ->icon('bs.trash3')
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->method('remove', [
                                    'post' => $post->id,
                                ]),
                        ])),
            ]),

        ];
    }

    /**
     * @param Post $post
     *
     * @return void
     */
    public function remove(Post $post): void
    {
        $post->delete();

        Toast::info('Пост удален');
    }
}
