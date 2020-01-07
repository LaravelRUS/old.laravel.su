@extends('layouts.master')

@section('title', 'Тест маркдауна')
@section('description', 'Тест маркдауна')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="mb-8">CSS-классы, используемые внутри документации</h1>

        <p>Для того, чтобы postcss не убил их при production сборке.</p>

        <h2>h2</h2>
        <h3>h3</h3>
        <h4>h4</h4>
        <blockquote>blockquote</blockquote>
        <code>code</code>
        <pre><code>pre code</code></pre>
    </div>
@endsection
