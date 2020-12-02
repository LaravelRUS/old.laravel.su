@extends('layouts.master')

@php
/**
 * @var \App\Entity\Version $version
 * @var \App\Entity\Documentation $page
 * @var \App\Entity\Documentation $menu
 */
@endphp

@section('title'){{ $page->title }} (Laravel {{ $version->name }})@stop
@section('description')Українська документація Laravel {{ $version->name }} - {{ $page->title }}@stop
@section('keywords'){{ $page->getKeywordsString() }}@stop

@push('header')
    @include('page.docs.partials.versions', ['version' => $version])
@endpush

@section('content')
    <section class="container documentation">
        <aside class="documentation-menu">
            {!! $menu !!}
        </aside>

        <article class="documentation-content">
            @include('page.docs.partials.translation-status', ['page' => $page])

            {!! $page !!}
        </article>
    </section>
@endsection
