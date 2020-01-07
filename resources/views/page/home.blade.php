@extends('layouts.master')

@section('title')
    Главная
@stop

@section('content')
    <div class="bg-white py-8 border-b border-gray-200 mb-8">
            <div class="container mx-auto flex flex-row">
                <div class="mr-8"><img src="/images/human.png" style="width: 500px"></div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl text-center mb-16 text-gray-600">Laravel — php-фреймворк нового поколения</div>
                    <div class="text-xl text-center text-gray-400 leading-normal mb-16">Мы верим, что процесс разработки
                        только тогда наиболее продуктивен, когда работа с фреймворком приносит радость и удовольствие.
                        Счастливые разработчики пишут лучший код.
                    </div>
                    <div>
                        <a href="/docs" class="text-white bg-red-500 p-4 font-bold rounded-lg">
                            Документация Laravel на русском языке
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <div class="container mx-auto px-4">
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
        </div>
@endsection
