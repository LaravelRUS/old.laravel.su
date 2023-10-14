<footer class="footer">
    <section class="container footer-content">
        @foreach(config('menu.footer.nav') as $title => $links)
            <section class="footer-column">
                <h4>@lang($title)</h4>
                <ul>
                    @foreach($links as $uri => $title)
                        <li>
                            <a href="{{ $uri }}" target="_blank" rel="nofollow">@lang($title)</a>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endforeach
    </section>
    <aside class="container footer-bottom">
        <address>Русскоязычное Сообщество Laravel Framework &copy; {{ date('Y') }}</address>
        <span style="padding: 0 20px">&middot;</span>
        <a href="https://github.com/LaravelRUS/laravel.su/tags">{{ config('app.version', 'dev') }}</a>

        <nav class="footer-bottom-menu">
            @foreach(config('menu.footer.menu') as $uri => $title)
                <a href="{{ $uri }}" target="_blank" rel="nofollow">@lang($title)</a>
                @unless($loop->last)
                    <span>&middot;</span>
                @endunless
            @endforeach
        </nav>
    </aside>
</footer>
