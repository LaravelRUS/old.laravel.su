<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Idea;

use App\Models\IdeaKey;
use App\Models\IdeaRequest;
use App\Notifications\IdeaRequestAcceptedNotification;
use App\Notifications\SimpleMessageNotification;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
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
        $ideaRequest->load(['user', 'key']);

        return [
            'ideaRequest'       => $ideaRequest,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Просмотр заявки';
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
                ->canSee(is_null($this->ideaRequest->key))
                ->confirm('Удаление заявки будет окончательным и необратимым действием. Вся информация, связанная с этой заявкой, будет безвозвратно удалена из системы.')
                ->method('remove'),

            Button::make(__('Принять и выдать ключ'))
                ->icon('bs.check-circle')
                ->canSee(is_null($this->ideaRequest->key))
                ->method('accept'),
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block(Layout::legend('ideaRequest', [
                Sight::make('first_name', 'Имя'),
                Sight::make('last_name', 'Фамилия'),
                Sight::make('email', 'Электронная почта'),
                Sight::make('city', 'Город'),
                Sight::make('message', 'Сообщение'),
                Sight::make('created_at', __('Created'))
                    ->usingComponent(DateTimeSplit::class),
                Sight::make('key.key', 'Ключ')
                    ->canSee(! is_null($this->ideaRequest->key)),
            ]))
                ->title(__('Данные запроса'))
                ->description('Проверьте, соответствуют ли данные условиям. Если все выглядит корректно, без несоответствий или сомнений, пожалуйста, одобрите заявку и отправьте участнику бесплатный ключ. Однако, если вы заметили какие-либо несоответствия или у вас возникли сомнения, рекомендуется отклонить данную заявку.'),
        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(IdeaRequest $ideaRequest)
    {
        $key = IdeaKey::whereNull('user_id')
            ->whereNull('request_id')
            ->first();

        $key->forceFill([
            'user_id'    => $ideaRequest->user_id,
            'request_id' => $ideaRequest->id,
            'activated'  => 1,
        ])->save();

        $ideaRequest->user->notify(new IdeaRequestAcceptedNotification($key));

        Toast::info('Информация обновлена');

        return redirect()->route('platform.idea');
    }

    /**
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(IdeaRequest $ideaRequest)
    {
        $user = $ideaRequest->user;
        $ideaRequest->delete();

        $user->notify(new SimpleMessageNotification('Ваш запрос на получение ключа Laravel Idea был отклонён'));

        Toast::info('Запрос удалён');

        return redirect()->route('platform.idea');
    }
}
