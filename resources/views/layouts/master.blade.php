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

    <title>@yield('title') — {{ config('app.name') }}</title>

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png" />
    <meta name="theme-color" content="#ffffff" />

    <link href="{{ mix('assets/app.css') }}?{{ \random_int(0, \PHP_INT_MAX) }}" rel="stylesheet" />

    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i&display=swap&subset=cyrillic" rel="stylesheet" />
</head>
<body>
    <main id="app">
        @include('partials.header')

        @stack('header')

        @yield('content')

        @stack('footer')

        @include('partials.footer')
        @include('partials.yandex-metrika')
    </main>
    <script src="{{ mix('assets/app.js') }}" async="async"></script>
</body>
</html>
