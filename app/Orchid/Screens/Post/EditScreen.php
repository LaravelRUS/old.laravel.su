<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class EditScreen extends Screen
{
    /**
     * @var Post
     */
    public $post;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Post $post): iterable
    {
        $post->load(['author']);

        return [
            'post'       => $post,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Просмотр публикации';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return '';
    }

    public function permission(): ?iterable
    {
        return [
            'site.content',
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Посмотреть на сайте')
                ->href(route('post.show', $this->post))
                ->target('_blank')
                ->icon('bs.eye'),

            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->confirm('Удаление публикации будет окончательным и необратимым действием. Вся информация, связанная с этой публикацией, будет безвозвратно удалена из системы.')
                ->method('remove'),

        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block(
                Layout::rows([
                    Input::make('post.title')
                        ->title('Заголовок'),
                    SimpleMDE::make('post.content')
                        ->title('Текст')
                        ->placeholder('Содержимое статьи'),

                ]))
                ->title(__('Статья'))
                ->description('')
                ->commands(
                    Button::make(__('Сохранить изменения'))
                        ->type(Color::SUCCESS)
                        ->icon('bs.check-circle')
                        ->method('update')
                ),
        ];
    }

    /**
     * @return RedirectResponse
     */
    public function update(Post $post, Request $request)
    {

        $post->forceFill($request->input('post'))->save();

        Toast::info('Информация обновлена');

        return redirect()->route('platform.post');
    }

    /**
     * @throws \Exception
     *
     * @return RedirectResponse
     */
    public function remove(Post $post)
    {
        $post->delete();

        Toast::info('Публикация удалена');

        return redirect()->route('platform.post');
    }
}
