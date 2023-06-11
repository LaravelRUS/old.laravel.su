<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=576, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />

    <title>@yield('title') — {{ config('app.name') }}</title>

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png" />
    <meta name="theme-color" content="#ffffff" />

    <link href="{{ mix('assets/app.css') }}" rel="stylesheet" />

    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i&display=swap&subset=cyrillic"
          media="print" onload="this.media='all'" rel="stylesheet" />
</head>
<body>
    <main id="app" class="@yield('layout-class')">
        @include('partials.header')

        @stack('header')

        @yield('content')

        @stack('footer')

        @include('partials.footer')
        @include('partials.yandex-metrika')
    </main>
    <script src="{{ mix('assets/app.js') }}" async="async"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('.copy_to_clipboard');
    </script>
</body>
</html>
