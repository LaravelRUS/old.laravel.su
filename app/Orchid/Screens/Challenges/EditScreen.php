<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Challenges;

use App\Models\Challenge;
use App\Models\Position;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class EditScreen extends Screen
{
    /**
     * @var Challenge
     */
    public $challenge;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Challenge $challenge): iterable
    {

        return [
            'challenge' => $challenge,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Управление челленджом';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Измените параметры челленджа и сохраните изменения, чтобы обновить информацию.';
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
            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->confirm('Удаление будет окончательным и необратимым действием.')
                ->method('remove')
                ->canSee($this->challenge->exists),
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
                    Input::make('challenge.title')
                        ->placeholder('Введите заголовок челленджа')
                        ->title('Заголовок'),

                    SimpleMDE::make('challenge.description')
                        ->title('Описание')
                        ->placeholder('Введите описание челленджа'),

                    DateTimer::make('challenge.start_at')
                        ->title('Дата и время начала')
                        ->placeholder('Выберите дату и время начала челленджа')
                        ->help('Выберите дату и время начала челленджа.')
                        ->enableTime(),

                    DateTimer::make('challenge.stop_at')
                        ->title('Дата и время окончания')
                        ->placeholder('Выберите дату и время окончания челленджа')
                        ->help('Выберите дату и время окончания челленджа.')
                        ->enableTime(),
                ]))
                ->title(__('Основное'))
                ->description('Здесь вы можете изменить параметры челленджа.')
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
    public function update(Challenge $challenge, Request $request)
    {
        $dateMax = now()->toDateString();

        $request->validate([
            'challenge'             => 'required|array',
            'challenge.title'       => 'required|string',
            'challenge.description' => 'required|string',
            'challenge.start_at'    => 'required|date|after:'.$dateMax,
            'challenge.stop_at'     => 'required|date|after:challenge.start_at',
        ]);

        $challenge->forceFill($request->input('challenge'))->save();

        Toast::info('Информация о челлендже успешно обновлена');

        return redirect()->route('platform.challenges');
    }

    /**
     * @throws \Exception
     *
     * @return RedirectResponse
     */
    public function remove(Position $position)
    {
        $position->delete();

        Toast::info('Челлендж был удалён');

        return redirect()->route('platform.challenges');
    }
}
