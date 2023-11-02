@extends('layouts.master')

@section('title', 'Главная')

@section('content')
    <section class="splash">
        <div class="container">
            <section class="splash-description">
                <h1>Laravel — php-фреймворк нового поколения</h1>
                <span>
                    Мы верим, что процесс разработки только тогда наиболее
                    продуктивен, когда работа с фреймворком приносит радость
                    и удовольствие. Счастливые разработчики пишут лучший код.
                </span>
            </section>

            <section class="splash-image">&nbsp;</section>
        </div>
    </section>

    <section class="section moonshine">
        <div class="container">
            <article class="moonshine-description section-description">
                <a href="https://moonshine-laravel.com" target="_blank" rel="nofollow"
                   class="moonshine-description-github">
                    <img src="/images/moonshine/website.png" alt="Moonshine Website" />
                </a>
                <h2>Moonshine Admin</h2>
                <span>
                    Moonshine &mdash; самостоятельное производство напитка в
                    нелегальных условиях под покровом ночи :) Так получилось, что
                    админка и была разработана ночью в свободное время под луной ;)
                    <br /><br />
                    Все уже готово для использования в ваших проектах!
                </span>
                <a href="https://moonshine-laravel.com" target="_blank" rel="nofollow"
                   class="button button-outer">Вперёд!</a>
            </article>

            <img class="moonshine-image section-image"
                 src="/images/moonshine/moonshine.png" alt="Moonshine Admin Panel" />
        </div>
    </section>

    <section class="section orchid">
        <div class="container">
            <article class="orchid-description section-description">
                <a href="https://github.com/orchidsoftware/platform" target="_blank" rel="nofollow"
                   class="orchid-description-github">
                    <img src="/images/orchid/github.png" alt="GitHub" />
                </a>
                <h2>Orchid Platform</h2>
                <span>
                    Пакет для создания приложений в стиле администрирования на
                    фреймворке Laravel. Позволяет абстрагировать общие шаблоны
                    бизнес-приложений, чтобы разработчикам было легко реализовывать
                    красивые и элегантные интерфейсы без особых усилий.
                </span>
                <a href="https://orchid.software" target="_blank" rel="nofollow"
                   class="button button-outer">Вот это да!</a>
            </article>

            <img class="orchid-image section-image"
                 src="/images/orchid/orchid.png?v2" alt="Orchid Admin Panel" />
        </div>
    </section>

    <section class="section idea">
        <div class="container">
            <article class="idea-description section-description">
                <a href="https://laravel-idea.com" target="_blank" rel="nofollow"
                   class="idea-description-market">
                    <img src="/images/idea/market.png" alt="JetBrains Market" />
                </a>
                <h2>Laravel Idea</h2>
                <span>
                    Расширение для платформы IDEA(PhpStorm), экономящее время при разработке решений на основе Laravel.
                    Прекрасное автозаполнение магии Laravel, навигация по коду, генераторы кода, автокомплит
                    валидаторов и роутов, и многое другое.
                </span>
                <a href="https://laravel-idea.com" target="_blank" rel="nofollow"
                   class="button button-outer">Хочу себе!</a>
            </article>

            <img class="idea-image section-image"
                 src="/images/idea/idea.png" alt="Laravel IDEA Plugin" />
        </div>
    </section>

    <section class="section sleeping-owl">
        <div class="container">
            <article class="sleeping-owl-description section-description">
                <a href="https://github.com/laravelrus/sleepingowladmin/" target="_blank" rel="nofollow"
                   class="sleeping-owl-description-github">
                    <img src="/images/sleeping-owl/github.png" alt="GitHub" />
                </a>
                <h2>SleepingOwl Admin</h2>
                <span>
                    SleepingOwl Admin &mdash; это гибкая административная панель для Laravel. За свою более чем
                    пятилетнюю историю &mdash; эта система зарекомендовала себя как мощное решение для разработки
                    интерфейса любого уровня.
                </span>
                <a href="https://github.com/laravelrus/sleepingowladmin/" target="_blank" rel="nofollow"
                   class="button button-outer">То что надо!</a>
            </article>

            <img class="sleeping-owl-image section-image"
                 src="/images/sleeping-owl/sleeping-owl.png" alt="SleepingOwl Admin Panel" />
        </div>
    </section>
@endsection
