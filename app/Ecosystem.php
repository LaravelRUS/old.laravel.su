<?php

namespace App;

class Ecosystem
{
    /**
     * Get the ecosystem items.
     *
     * @return array
     */
    public static function items(): array
    {
        return [
            'breeze' => [
                'name'        => 'Breeze',
                'image-alt'   => 'Логотип Laravel Breeze',
                'description' => 'Легкий стартовый набор для создания новых приложений с использованием Blade или Inertia.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/starter-kits#laravel-breeze',
                'color'       => '#F3C14B',
            ],
            'cashier' => [
                'name'        => 'Cashier',
                'image-alt'   => 'Логотип Laravel Cashier',
                'description' => 'Упрощает управление подписками на Stripe или Paddle.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/billing',
                'color'       => '#91D630',
            ],
            'dusk' => [
                'name'        => 'Dusk',
                'image-alt'   => 'Логотип Laravel Dusk',
                'description' => 'Автоматизированное тестирование в браузере для доставки вашего приложения с уверенностью.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/dusk',
                'color'       => '#BB358B',
            ],
            'echo' => [
                'name'        => 'Echo',
                'image-alt'   => 'Логотип Laravel Echo',
                'description' => 'Слушайте события WebSocket, транслируемые вашим приложением Laravel.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/broadcasting',
                'color'       => '#4AB2B0',
            ],
            'envoyer' => [
                'name'        => 'Envoyer',
                'image-alt'   => 'Логотип Envoyer',
                'description' => 'Разворачивайте ваши приложения Laravel для клиентов без простоев.',
                'href'        => 'https://envoyer.io',
                'color'       => '#F56857',
            ],
            'forge' => [
                'name'        => 'Forge',
                'image-alt'   => 'Логотип Forge',
                'description' => 'Управление сервером не должно быть кошмаром.',
                'href'        => 'https://forge.laravel.com',
                'color'       => '#1EB786',
            ],
            'herd' => [
                'name'        => 'Herd',
                'image-alt'   => 'Логотип Herd',
                'description' => 'Самый быстрый опыт разработки на Laravel локально - исключительно для macOS.',
                'href'        => 'https://herd.laravel.com',
                'color'       => '#dc2626',
            ],
            'horizon' => [
                'name'        => 'Horizon',
                'image-alt'   => 'Логотип Laravel Horizon',
                'description' => 'Красивый пользовательский интерфейс для мониторинга очередей Laravel, управляемых Redis.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/horizon',
                'color'       => '#8C6ED3',
            ],
            'inertia' => [
                'name'        => 'Inertia',
                'image-alt'   => 'Логотип Inertia',
                'description' => 'Создавайте современные одностраничные приложения React и Vue, используя классическую маршрутизацию на стороне сервера.',
                'href'        => 'https://inertiajs.com',
                'color'       => '#9553e9',
            ],
            'jetstream' => [
                'name'        => 'Jetstream',
                'image-alt'   => 'Логотип Laravel Jetstream',
                'description' => 'Мощный стартовый набор, включающий аутентификацию и управление командами.',
                'href'        => 'https://jetstream.laravel.com',
                'color'       => '#6875f5',
            ],
            'livewire' => [
                'name'        => 'Livewire',
                'image-alt'   => 'Логотип Laravel Livewire',
                'description' => 'Создавайте реактивные, динамические приложения с использованием Laravel и Blade.',
                'href'        => 'https://livewire.laravel.com',
                'color'       => '#fb70a9',
            ],
            'nova' => [
                'name'        => 'Nova',
                'image-alt'   => 'Логотип Laravel Nova',
                'description' => 'Тщательно разработанная панель администратора для ваших приложений Laravel.',
                'href'        => 'https://nova.laravel.com',
                'color'       => '#4099DE',
            ],
            'octane' => [
                'name'        => 'Octane',
                'image-alt'   => 'Логотип Laravel Octane',
                'description' => 'Увеличьте производительность вашего приложения, оставив его в памяти.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/octane',
                'color'       => '#CA3A31',
            ],
            'pennant' => [
                'name'        => 'Pennant',
                'image-alt'   => 'Логотип Laravel Pennant',
                'description' => 'Простая, легкая библиотека для управления флагами функций.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/pennant',
                'color'       => '#1aa44a',
            ],
            'pint' => [
                'name'        => 'Pint',
                'image-alt'   => 'Логотип Laravel Pint',
                'description' => 'Основанный на мнениях исправитель стиля кода PHP для минималистов.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/pint',
                'color'       => '#ffd000',
            ],
            'prompts' => [
                'name'        => 'Prompts',
                'image-alt'   => 'Логотип Laravel Prompts',
                'description' => 'Красивые и удобные формы для командных приложений.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/prompts',
                'color'       => '#4ade80',
            ],
            'sail' => [
                'name'        => 'Sail',
                'image-alt'   => 'Логотип Laravel Sail',
                'description' => 'Ручной локальный опыт разработки на Laravel с использованием Docker.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/sail',
                'color'       => '#38BDF7',
            ],
            'sanctum' => [
                'name'        => 'Sanctum',
                'image-alt'   => 'Логотип Laravel Sanctum',
                'description' => 'Аутентификация API и мобильных приложений без волосатых проблем.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/sanctum',
                'color'       => '#1D5873',
            ],
            'scout' => [
                'name'        => 'Scout',
                'image-alt'   => 'Логотип Laravel Scout',
                'description' => 'Мгновенный полнотекстовый поиск для моделей Eloquent вашего приложения.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/scout',
                'color'       => '#F55D5C',
            ],
            'socialite' => [
                'name'        => 'Socialite',
                'image-alt'   => 'Логотип Laravel Socialite',
                'description' => 'Социальная аутентификация через Facebook, Twitter, GitHub, LinkedIn и другие.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/socialite',
                'color'       => '#E394BA',
            ],
            'spark' => [
                'name'        => 'Spark',
                'image-alt'   => 'Логотип Laravel Spark',
                'description' => 'Запустите ваш следующий бизнес с нашим полнофункциональным, готовым к использованию платежным порталом.',
                'href'        => 'https://spark.laravel.com',
                'color'       => '#9B8BFB',
            ],
            'telescope' => [
                'name'        => 'Telescope',
                'image-alt'   => 'Логотип Laravel Telescope',
                'description' => 'Отлаживайте ваше приложение, используя наш интерфейс отладки и анализа.',
                'href'        => '/docs/'.Docs::DEFAULT_VERSION.'/telescope',
                'color'       => '#4040C8',
            ],
            'vapor' => [
                'name'        => 'Vapor',
                'image-alt'   => 'Логотип Laravel Vapor',
                'description' => 'Laravel Vapor - это платформа для бессерверного развертывания для Laravel, работающая на AWS.',
                'href'        => 'https://vapor.laravel.com',
                'color'       => '#25c4f2',
            ],
        ];
    }
}
