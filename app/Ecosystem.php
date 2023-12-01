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
                'name' => 'Breeze',
                'image-alt' => 'Laravel Breeze Logo Logo',
                'description' => 'Lightweight starter kit scaffolding for new applications with Blade or Inertia.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/starter-kits#laravel-breeze',
                'color' => '#F3C14B',
            ],
            'cashier' => [
                'name' => 'Cashier',
                'image-alt' => 'Laravel Cashier Logo',
                'description' => 'Take the pain out of managing subscriptions on Stripe or Paddle.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/billing',
                'color' => '#91D630'
            ],
            'dusk' => [
                'name' => 'Dusk',
                'image-alt' => 'Laravel Dusk Logo',
                'description' => 'Automated browser testing to ship your application with confidence.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/dusk',
                'color' => '#BB358B'
            ],
            'echo' => [
                'name' => 'Echo',
                'image-alt' => 'Laravel Echo Logo',
                'description' => 'Listen for WebSocket events broadcast by your Laravel application.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/broadcasting',
                'color' => '#4AB2B0'
            ],
            'envoyer' => [
                'name' => 'Envoyer',
                'image-alt' => 'Envoyer Logo',
                'description' => 'Deploy your Laravel applications to customers with zero downtime.',
                'href' => 'https://envoyer.io',
                'color' => '#F56857'
            ],
            'forge' => [
                'name' => 'Forge',
                'image-alt' => 'Forge Logo',
                'description' => 'Server management doesn\'t have to be a nightmare.',
                'href' => 'https://forge.laravel.com',
                'color' => '#1EB786'
            ],
            'herd' => [
                'name' => 'Herd',
                'image-alt' => 'Herd Logo',
                'description' => 'The fastest Laravel local development experience - exclusively for macOS.',
                'href' => 'https://herd.laravel.com',
                'color' => '#dc2626'
            ],
            'horizon' => [
                'name' => 'Horizon',
                'image-alt' => 'Laravel Horizon Logo',
                'description' => 'Beautiful UI for monitoring your Redis driven Laravel queues.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/horizon',
                'color' => '#8C6ED3'
            ],
            'inertia' => [
                'name' => 'Inertia',
                'image-alt' => 'Inertia Logo',
                'description' => 'Create modern single-page React and Vue apps using classic server-side routing.',
                'href' => 'https://inertiajs.com',
                'color' => '#9553e9'
            ],
            'jetstream' => [
                'name' => 'Jetstream',
                'image-alt' => 'Laravel Jetstream Logo',
                'description' => 'Robust starter kit including authentication and team management.',
                'href' => 'https://jetstream.laravel.com',
                'color' => '#6875f5'
            ],
            'livewire' => [
                'name' => 'Livewire',
                'image-alt' => 'Laravel Livewire Logo',
                'description' => 'Build reactive, dynamic applications using Laravel and Blade.',
                'href' => 'https://livewire.laravel.com',
                'color' => '#fb70a9'
            ],
            'nova' => [
                'name' => 'Nova',
                'image-alt' => 'Laravel Nova Logo',
                'description' => 'Thoughtfully designed administration panel for your Laravel applications.',
                'href' => 'https://nova.laravel.com',
                'color' => '#4099DE'
            ],
            'octane' => [
                'name' => 'Octane',
                'image-alt' => 'Laravel Octane Logo',
                'description' => 'Supercharge your application\'s performance by keeping it in memory.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/octane',
                'color' => '#CA3A31'
            ],
            'pennant' => [
                'name' => 'Pennant',
                'image-alt' => 'Laravel Pennant Logo',
                'description' => 'A simple, lightweight library for managing feature flags.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/pennant',
                'color' => '#1aa44a'
            ],
            'pint' => [
                'name' => 'Pint',
                'image-alt' => 'Laravel Pint Logo',
                'description' => 'Opinionated PHP code style fixer for minimalists.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/pint',
                'color' => '#ffd000'
            ],
            'prompts' => [
                'name' => 'Prompts',
                'image-alt' => 'Laravel Prompts Logo',
                'description' => 'Beautiful and user-friendly forms for command-line applications.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/prompts',
                'color' => '#4ade80'
            ],
            'sail' => [
                'name' => 'Sail',
                'image-alt' => 'Laravel Sail Logo',
                'description' => 'Hand-crafted Laravel local development experience using Docker.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/sail',
                'color' => '#38BDF7'
            ],
            'sanctum' => [
                'name' => 'Sanctum',
                'image-alt' => 'Laravel Sanctum Logo',
                'description' => 'API and mobile application authentication without wanting to pull your hair out.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/sanctum',
                'color' => '#1D5873'
            ],
            'scout' => [
                'name' => 'Scout',
                'image-alt' => 'Laravel Scout Logo',
                'description' => 'Lightning fast full-text search for your application\'s Eloquent models.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/scout',
                'color' => '#F55D5C'
            ],
            'socialite' => [
                'name' => 'Socialite',
                'image-alt' => 'Laravel Socialite Logo',
                'description' => 'Social authentication via Facebook, Twitter, GitHub, LinkedIn, and more.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/socialite',
                'color' => '#E394BA'
            ],
            'spark' => [
                'name' => 'Spark',
                'image-alt' => 'Laravel Spark Logo',
                'description' => 'Launch your next business with our fully-featured, drop-in billing portal.',
                'href' => 'https://spark.laravel.com',
                'color' => '#9B8BFB'
            ],
            'telescope' => [
                'name' => 'Telescope',
                'image-alt' => 'Laravel Telescope Logo',
                'description' => 'Debug your application using our debugging and insight UI.',
                'href' => '/docs/' . Docs::DEFAULT_VERSION . '/telescope',
                'color' => '#4040C8'
            ],
            'vapor' => [
                'name' => 'Vapor',
                'image-alt' => 'Laravel Vapor Logo',
                'description' => 'Laravel Vapor is a serverless deployment platform for Laravel, powered by AWS.',
                'href' => 'https://vapor.laravel.com',
                'color' => '#25c4f2'
            ]
        ];
    }
}
