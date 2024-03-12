<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;
use NotificationChannels\Telegram\TelegramMessage;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            $this->notificationToTelegram($e);
        });
    }

    /**
     * Send notification to Telegram.
     */
    private function notificationToTelegram($exception): void
    {
        if (config('app.env') == 'local') {
            return;
        }

        // Send notification to Telegram
        try {
            TelegramMessage::create()
                ->to(config('services.telegram-bot-api.chat_id'))
                ->line('*⚠️ Ой-ой-ой!* Возникла неприятность в нашем коде. Пользователь столкнулся с неожиданной ошибкой на сайте.')
                ->line('`')
                ->escapedLine(Str::of($exception->getMessage())->ucfirst())
                ->line('`')
                ->escapedLine('📄 Код ошибки: '.$exception->getCode())
                ->escapedLine('📂 Файл: '.Str::after($exception->getFile(), base_path()).'#'.$exception->getLine())
                ->line('')
                ->line('*🔧 Что делать?*')
                ->line('Давайте взглянем на этот участок кода внимательно и исправим проблему. С вашими умениями мы сможем преодолеть эту преграду!')
                ->line('')
                ->line('*💪 Не сдавайтесь!*')
                ->line('Каждая ошибка - это шанс стать лучше. Давайте использовать этот момент, чтобы улучшить наш код и стать еще сильнее. Удачи!')
                ->send();
        } catch (\Exception|Throwable) {
            // without recursive
        }
    }
}
