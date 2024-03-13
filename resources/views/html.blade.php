<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-controller="theme" data-bs-theme="auto">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="google" content="notranslate">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#c22c2c">
    <link rel="shortcut icon" href="/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="msapplication-config" content="/favicon/browserconfig.xml">

    <!-- PWA -->
    <link rel="manifest" href="{{ route('manifest') }}">
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#fafafa" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#171923" media="(prefers-color-scheme: dark)">

    <meta name="view-transition" content="same-origin">
    <meta name="turbo-refresh-method" content="morph">
    <meta name="turbo-refresh-scroll" content="preserve">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="alternate" type="application/atom+xml" title="Новости" href="/rss/feed">

    <x-meta
            title="{!! View::getSection('title') ?  strip_tags(View::getSection('title')) . ' | '. config('site.name') : config('site.name') !!}"
            description="{!!  View::getSection('description', config('site.description'))  !!}"
         image="{!! route('cover', ['text' => View::getSection('title', config('site.description'))]) !!}"
        {{-- csp="*.laravel.su *.gravatar.com *.githubusercontent.com" --}} />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body>
    @yield('body')
</body>

</html>
