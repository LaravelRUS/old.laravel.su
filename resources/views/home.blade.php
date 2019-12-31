@extends('layouts.app')

@section('content')
    <div style="min-height: 1000px">
        <div class="w-full flex flex-row">

            <div class="w-1/3 mr-4">
                <div class="card flex flex-col shadow items-center">
                    <div class="mb-8 text-3xl">Laravel Idea</div>
                    <div class="mb-8">Удобный плагин для разработки в Phpstorm</div>
                    <div class="mb-4 "><a class="link" href="https://plugins.jetbrains.com/plugin/13441-laravel-idea/">Видео</a> | <a class="link" href="https://plugins.jetbrains.com/plugin/13441-laravel-idea/">Plugin store</a></div>
                </div>
            </div>

            <div class="w-1/3 mr-4">
                <div class="card flex flex-col shadow items-center">
                    <div class="mb-8 text-3xl">SleepingOwl Admin</div>
                    <div class="mb-8">Генератор админ-интерфейса для Laravel</div>
                    <div class="mb-4 "><a class="link" href="https://sleepingowladmin.ru/">sleepingowladmin.ru</a></div>
                </div>
            </div>

            <div class="w-1/3">
                <div class="card flex flex-col shadow items-center">
                    <div class="mb-8 text-3xl">Orchid</div>
                    <div class="mb-8">Платформа для back-office приложений на Laravel</div>
                    <div class="mb-4 "><a class="link" href="https://orchid.software/ru/">orchid.software</a></div>
                </div>
            </div>

        </div>
    </div>
@endsection
