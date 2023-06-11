<header class="header">
    <section class="extras">
        <nav class="container extras-items">
            @foreach(config('menu.header.links') as $uri => $title)
                <a href="{{ $uri }}" target="_blank" rel="nofollow">@lang($title)</a>
            @endforeach
        </nav>
    </section>

    <section class="menu">
        <section class="container menu-content">
            <a href="{{ route('home') }}" class="logo">
                <h1>{{ config('app.name') }}</h1>
            </a>

            <aside class="menu-aside">
                {{--<section class="menu-search">
                    <input type="text" class="menu-search-input" placeholder="Поиск по документации" />
                    <a href="#" class="button menu-search-button">Искать</a>
                </section>--}}

                <nav class="menu-items">
                    <a href="{{ route('home') }}" class="@active('home')">Главная</a>
                    <a href="{{ route('docs') }}" class="@active('docs.*')">Документация</a>
                    <a href="{{ route('status') }}" class="@active('status.*')">Перевод</a>
                    <span>Статьи</span>
                    <span>Пакеты</span>
                </nav>
            </aside>
        </section>
    </section>
</header>
