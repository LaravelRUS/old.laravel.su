@extends("layouts/docs")

@section("content")

    <h1 class="mb-8">CSS-классы, используемые внутри документации</h1>

    <p>Для того, чтобы postcss не убил их при production сборке.</p>

    <h2>h2</h2>
    <h3>h3</h3>
    <h4>h4</h4>
    <blockquote>blockquote</blockquote>
    <code>code</code>
    <pre><code>pre code</code></pre>


@endsection
