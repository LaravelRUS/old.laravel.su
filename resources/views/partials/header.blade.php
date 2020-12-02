<header class="header">
    {{--<section class="extras alternative">
        <nav class="container extras-items">
            <span>Регистрация на <a href="https://phprussia.ru" target="_blank" rel="nofollow">PHPRussia 2020</a> уже открыта:</span>
            <a href="https://phprussia.ru/moscow/2020/abstracts" target="_blank" rel="nofollow">Доклады</a>
            <span>&middot;</span>
            <a href="https://phprussia.ru/moscow/2020/meetups" target="_blank" rel="nofollow">Митапы</a>
            <span>&middot;</span>
            <a href="https://phprussia.ru/moscow/2020#prices" target="_blank" rel="nofollow">Цены</a>
        </nav>
    </section>--}}

    <section class="extras">
        <nav class="container extras-items">
            <a href="https://laravel.com/" target="_blank" rel="nofollow">Laravel</a>
            <a href="https://laravel-idea.com" target="_blank" rel="nofollow">Laravel IDEA</a>
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
                    <a href="{{ route('home') }}" class="@active('home')">Головна</a>
                    <a href="{{ route('docs', '8.x') }}" class="@active('docs.*')">Документація</a>
                    <a href="{{ route('status') }}" class="@active('status.*')">Переклад</a>
                    <span>Статті(в процессі)</span>
                    <span>Пакети(в процессі)</span>
                </nav>
            </aside>
        </section>
    </section>
</header>
