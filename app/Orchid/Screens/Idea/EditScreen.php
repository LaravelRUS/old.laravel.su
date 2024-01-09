<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Idea;

use App\Models\IdeaKey;
use App\Models\IdeaRequest;
use App\Notifications\IdeaRequestAcceptedNotification;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class EditScreen extends Screen
{
    /**
     * @var IdeaRequest
     */
    public $ideaRequest;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(IdeaRequest $ideaRequest): iterable
    {
        $ideaRequest->load(['user','key']);
        //$ideaRequest->key()->delete();


        return [
            'ideaRequest'       => $ideaRequest,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Edit Request';
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
                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                ->method('remove'),
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [

            Layout::block(Layout::rows([
                    Input::make('ideaRequest.first_name')
                        ->readonly()
                        ->title('Имя'),
                    Input::make('ideaRequest.key.key')
                        ->readonly()
                        ->title('Ключ'),

                    Input::make('ideaRequest.last_name')
                        ->readonly()
                        ->title('Фамилия'),



                    Input::make('ideaRequest.email')
                        ->readonly()
                        ->title('email'),

                    Input::make('ideaRequest.city')
                        ->readonly()
                        ->title('город'),

                    TextArea::make('ideaRequest.message')
                        ->readonly()
                        ->title('сообщение'),
                    ]))
                ->title(__('Данные запроса'))
                ->description(__(''))
                ->commands(
                    Button::make(__('Принять и выдать ключ'))
                        ->type(Color::SUCCESS)
                        ->icon('bs.check-circle')
                        ->canSee(is_null($this->ideaRequest->key))
                        ->method('accept')
                ),
            ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(IdeaRequest $ideaRequest)
    {
        $key = IdeaKey::whereNull('user_id')->whereNull('request_id')->first();
        $key->forceFill([
            'user_id' => $ideaRequest->user_id,
            'request_id' => $ideaRequest->id,
            'activated' => 1
        ])->save();
        $ideaRequest->user->notify(new IdeaRequestAcceptedNotification($key));


        Toast::info("Информация обновлена");

        return redirect()->route('platform.idea');
    }

    /**
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(IdeaRequest $ideaRequest)
    {
        $ideaRequest->delete();

        Toast::info('Запрос удалён');

        return redirect()->route('platform.idea');
    }

}
