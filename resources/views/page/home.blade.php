@extends('layouts.master')

@section('title')
    Главная
@stop

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
            </article>

            <img class="orchid-image section-image" src="/images/orchid/orchid.png" alt="Orchid Admin Panel" />
        </div>
    </section>

    <section class="section idea">
        <div class="container">
            <article class="idea-description section-description">
                <a href="https://plugins.jetbrains.com/plugin/13441-laravel-idea" target="_blank" rel="nofollow"
                   class="idea-description-market">
                    <img src="/images/idea/market.png" alt="JetBrains Market" />
                </a>
                <h2>Laravel Plugin</h2>
                <span>
                    Расширение для платформы IDEA, экономящее время при разработке решений на основе Laravel.
                    Прекрасное автозаполнение магии Laravel, навигация по коду, генераторы кода моделей, автокомплит
                    валидаторов и роутов, и многое другое.
                </span>
            </article>

            <img class="idea-image section-image" src="/images/idea/idea.png" alt="Laravel IDEA Plugin" />
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
            </article>

            <img class="sleeping-owl-image section-image" src="/images/sleeping-owl/sleeping-owl.png" alt="SleepingOwl Admin Panel" />
        </div>
    </section>
@endsection
