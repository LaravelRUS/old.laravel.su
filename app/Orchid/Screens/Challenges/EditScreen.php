<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Challenges;

use App\Casts\ScheduleEnum;
use App\Models\Challenge;
use App\Models\Position;
use App\Notifications\SimpleMessageNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
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
            'challenge'       => $challenge,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'челлендж';
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
                        ->title('Заголовок'),

                    Input::make('challenge.subject')
                        ->title('Тема'),

                    SimpleMDE::make('challenge.description')
                        ->title('Описание')
                        ->placeholder('Задания челленджа'),

                    DateTimer::make('challenge.start_date')
                        ->title('начало')
                        ->enableTime(),

                    DateTimer::make('challenge.stop_date')
                        ->title('конец')
                        ->enableTime(),



                ]))
                ->title(__('Челлендж'))
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
    public function update(Challenge $challenge, Request $request)
    {
        $dateMax = now()->toDateString();

        $request->validate([
            'challenge'               => 'required|array',
            'challenge.title'         => 'required|string',
            'challenge.description'   => 'required|string',
            'challenge.subject'  => 'required|string',
            'challenge.start_date'  => 'required|date|after:'.$dateMax,
            'challenge.stop_date'  => 'required|date|after:challenge.start_date',
        ]);

        $challenge->forceFill($request->input('challenge'))->save();

        Toast::info('Информация обновлена');

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

        Toast::info('Челлендж удалён');


        return redirect()->route('platform.challenges');
    }
}
