@extends('layouts.master')

@section('title', 'Тест маркдауна')
@section('description', 'Тест маркдауна')

@section('content')
    <div class="container docs_content" style="padding: 10px 0 200px 0">
        <h1>Заголовок h1</h1>
        <h2>Заголовок h2</h2>
        <h3>Заголовок h3</h3>
        <h4>Заголовок h4</h4>
        <h5>Заголовок h5</h5>

        <p>Параграф с <code>кодом</code> внутри</p>

        <blockquote>Стандартная цитата</blockquote>
        <p>The Laravel framework has a few system requirements. Of course, all
            of these requirements are satisfied by the Laravel Homestead virtual
            machine, so it's highly recommended that you use Homestead as your local
            Laravel development environment.</p>
        <p>The Laravel framework has a few system requirements. Of course, all
            of these requirements are satisfied by the Laravel Homestead virtual
            machine, so it's highly recommended that you use Homestead as your local
            Laravel development environment.</p>
        <blockquote class="quote-video">Цитата с видео</blockquote>
        <p>The Laravel framework has a few system requirements. Of course, all
            of these requirements are satisfied by the Laravel Homestead virtual
            machine, so it's highly recommended that you use Homestead as your local
            Laravel development environment.</p>
        <p>The Laravel framework has a few system requirements. Of course, all
            of these requirements are satisfied by the Laravel Homestead virtual
            machine, so it's highly recommended that you use Homestead as your local
            Laravel development environment.</p>
        <blockquote class="quote-note">Цитата с нотификацией</blockquote>
        <p>The Laravel framework has a few system requirements. Of course, all
            of these requirements are satisfied by the Laravel Homestead virtual
            machine, so it's highly recommended that you use Homestead as your local
            Laravel development environment.</p>
        <blockquote class="quote-tip">Цитата с примечанием</blockquote>
        <p>Пример параграфа</p>

        <pre><code data-lang="assembler">Какой-то код</code></pre>
        <p>Пример параграфа</p>

        <h3>Пример документации h2</h3>
        <p>The Laravel framework has a few system requirements. Of course, all
            of these requirements are satisfied by the Laravel Homestead virtual
            machine, so it's highly recommended that you use Homestead as your local
            Laravel development environment.</p>
        <p>However, if you are not using Homestead, you will need to make sure
            your server meets the following requirements:</p>
        <ul>
            <li>PHP >= 5.6.4</li>
            <li>OpenSSL PHP Extension</li>
            <li>PDO PHP Extension</li>
            <li>Mbstring PHP Extension</li>
            <li>Tokenizer PHP Extension</li>
            <li>XML PHP Extension</li>
        </ul>
    </div>
@endsection
