<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />

    <title>@yield('title') &mdash; {{ config('app.name') }}</title>

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png" />
    <meta name="theme-color" content="#ffffff" />

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('js/app.js') }}" async="async"></script>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        @include('partials.header')

        @yield('app')

        @include('partials.footer')
        @include('partials.yandex_metrika')
    </div>
</body>
</html>
