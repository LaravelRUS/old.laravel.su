@extends('layouts.master')

@section('title', 'Главная')

@section('content')
    <section class="splash">
        <div class="container">
            <section class="splash-description">
                <h1>Laravel — популярний php-фреймворк, що постійно оновлюється</h1>
                <span>
                    Має широку спільноту по світу. Дозволяє будувати швидкі та безпечні сайти та має чудову документацію.
                </span>
            </section>

            <section class="splash-image">&nbsp;</section>
        </div>
    </section>

    {{-- <section class="section orchid">
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

            <img class="orchid-image section-image" src="/images/orchid/orchid.png?v2" alt="Orchid Admin Panel" />
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
    </section> --}}
@endsection
