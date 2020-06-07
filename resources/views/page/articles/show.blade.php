@extends('layouts.master')

@section('title', $article->title)
@section('description', $article->description)

@section('content')
    <section class="container article">
        <h1>{{ $article->title }}</h1>

        <article class="article-content">
            {!! $article->body !!}
        </article>
    </section>
@endsection


