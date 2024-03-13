<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\CodeSnippet;
use App\Models\Comment;
use App\Models\IdeaKey;
use App\Models\IdeaRequest;
use App\Models\Meet;
use App\Models\Package;
use App\Models\Position;
use App\Models\Post;
use App\Models\User;
use App\Orchid\Layouts\BasicIndicators;
use Carbon\Carbon;
use Orchid\Screen\Screen;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $start = Carbon::now()->subDays(30);
        $end = Carbon::now();

        return [
            'basicIndicators'                => [
                User::countByDays($start, $end)->toChart('Пользователи'),
                Comment::countByDays($start, $end)->toChart('Комментарии'),
                CodeSnippet::countByDays($start, $end)->toChart('Pastebin'),
            ],
            'content'                => [
                Post::countByDays($start, $end)->toChart('Посты'),
                Meet::countByDays($start, $end)->toChart('Мероприятия'),
                Package::countByDays($start, $end)->toChart('Пакеты'),
                Position::countByDays($start, $end)->toChart('Вакансии'),
            ],
            'idea' => [
                IdeaRequest::countByDays($start, $end)->toChart('Запросы ключей'),
                IdeaKey::where('activated', 1)->countByDays($start, $end, 'updated_at')->toChart('Выданные ключи'),
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Статистика';
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
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            BasicIndicators::make('basicIndicators')
                ->description('График отображает количество зарегистрированных пользователей и оставленных комментариев по дням')
                ->title('Пользователи'),

            BasicIndicators::make('content')
                ->title('Контент')
                ->description('Количество новых стаей,пакетов,мероприятий и вакансий по дням'),

            BasicIndicators::make('idea')
                ->description('Количество запросов и выданных ключей Laravel Idea по дням')
                ->title('Idea'),

        ];
    }
}
