@extends('layouts.master')

@php
    /**
     * @var \App\Domain\Documentation\Version $version
     * @var \App\Domain\Documentation\Documentation $page
     * @var \App\Domain\Documentation\Documentation $menu
     */
@endphp

@section('title'){{ $page->getTitle() }} (Laravel {{ $version->name }})@stop

@section('description')Русская документация Laravel {{ $version->name }} — {{ $page->getTitle() }}@stop

@section('keywords', $page->getKeywordsString())

@push('header')
    @include('page.docs.partials.versions', ['version' => $version, 'page' => $page])
@endpush

@section('layout-class', 'layout-documentation')

@section('content')
    <section class="container documentation">
        <aside class="documentation-menu" data-vm="MenuViewModel">
            {!! $menu !!}
            {{--
            <nav class="extras">
                <span>Регистрация на <a href="https://phprussia.ru/moscow/2022" target="_blank" rel="nofollow">PHPRussia 2022</a> уже открыта:</span>
                <a href="https://phprussia.ru/moscow/2022/abstracts" target="_blank" rel="nofollow">Доклады</a>
                <span>&middot;</span>
                <a href="https://phprussia.ru/moscow/2022/meetups" target="_blank" rel="nofollow">Митапы</a>
                <span>&middot;</span>
                <a href="https://phprussia.ru/moscow/2022#prices" target="_blank" rel="nofollow">Цены</a>
            </nav>
            --}}
        </aside>

        <article class="documentation-content">
            @include('page.docs.partials.translation-status', ['page' => $page])

            {!! $page !!}
        </article>
    </section>
@endsection
