<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="./favicon.png"/>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <div class="flex justify-center bg-red-500">
            <div>
                <img src="/images/header_line.png" />
            </div>
        </div>
        <div class="bg-white py-4 border-b border-gray-200 ">
            <div class="container mx-auto px-4 flex flex-row justify-start items-center">
                <a href="/" class="flex flex-row justify-start items-center">
                <div class="mr-4"><img src="/images/logo_laravel.png" /></div>
                <div class="mr-4"><img src="/images/logo_title.png" /></div>
                </a>
                <div class="px-8 flex flex-row items-center">
                    <div>
                        <a href="/docs" class="text-sm font-bold text-gray-600 hover:text-gray-800 mb-1">Документация</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white py-8 border-b border-gray-200 mb-8">
            <div class="container mx-auto flex flex-row">
                <div class="mr-8"><img src="/images/human.png" style="width: 500px"></div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl text-center mb-16 text-gray-600">Laravel — php-фреймворк нового поколения</div>
                    <div class="text-xl text-center text-gray-400 leading-normal mb-16">Мы верим, что процесс разработки только тогда наиболее продуктивен, когда работа с фреймворком приносит радость и удовольствие. Счастливые разработчики пишут лучший код.</div>
                    <div>
                        <a href="/docs" class="text-white bg-red-500 p-4 font-bold rounded-lg">
                            Документация Laravel на русском языке
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4">
            @yield('content')
        </div>

        @include("layouts._footer")

        @include("layouts._yandex_metrika")

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
