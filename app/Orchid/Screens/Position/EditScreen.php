<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Position;

use App\Casts\ScheduleEnum;
use App\Models\Position;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class EditScreen extends Screen
{
    /**
     * @var Position
     */
    public $position;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Position $position): iterable
    {
        $position->load(['author']);

        return [
            'position'       => $position,
            'position.schedule' => $position->schedule?->value,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Просмотр вакансии';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return '';
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
                ->confirm( "Удаление вакансии будет окончательным и необратимым действием.")
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
                    Input::make('position.title')
                        ->title('Заголовок'),

                    SimpleMDE::make('position.description')
                        ->title('Текст')
                        ->placeholder('Содержимое статьи'),

                    Input::make('position.organization')
                        ->title('Организация'),

                    Input::make('position.location')
                        ->title('Локация'),

                    Select::make('position.schedule')
                        ->options($this->getSchedules())
                        ->title('Формат'),

                    Input::make('position.contact')
                        ->title('Контакты'),

                    Input::make('position.salary_min')
                        ->type('number')
                        ->min(0)
                        ->step(1000)
                        ->title('От'),

                    Input::make('position.salary_max')
                        ->type('number')
                        ->min(0)
                        ->step(1000)
                        ->title('До'),

                    Switcher::make('position.approved')
                        ->sendTrueOrFalse()
                        ->title('Статус')
                        ->placeholder('Одобренный')
                        ->help('Одобренные вакансии будут видны на сайте'),




                ]))
                ->title(__('Вакансия'))
                ->description("")
                ->commands(
                    Button::make(__('Сохранить изменения'))
                        ->type(Color::SUCCESS)
                        ->icon('bs.check-circle')
                        ->method('update')
                )
            ];
    }

    /**
     * @return RedirectResponse
     */
    public function update(Position $position,Request $request)
    {
        $request->validate([
            'position'              => 'required|array',
            'position.title'        => 'required|string',
            'position.description'  => 'required|string',
            'position.organization' => 'required|string',
            'position.salary_min'   => 'sometimes|numeric|nullable',
            'position.salary_max'   => 'sometimes|numeric|nullable',
            'position.location'      => 'required|string',
            'position.schedule'     => [
                'required', Rule::enum(ScheduleEnum::class),
            ],
        ]);

        $position->forceFill($request->input('position'))->save();

        Toast::info("Информация обновлена");

        return redirect()->route('platform.position');
    }

    /**
     * @throws \Exception
     *
     * @return RedirectResponse
     */
    public function remove(Position $position)
    {
        $position->delete();

        Toast::info('Вакансия удалена');

        return redirect()->route('platform.position');
    }

    public function getSchedules(): array
    {
        return collect(ScheduleEnum::cases())
            ->mapWithKeys(fn (ScheduleEnum $schedule) => [$schedule->value => $schedule->text()])
            ->all();
    }

}
