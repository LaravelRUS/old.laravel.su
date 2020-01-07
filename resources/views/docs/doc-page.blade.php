@extends('layouts.master')

@section('title'){{ $page->title }} (Laravel {{ $version->title }})@stop
@section('description')Русская документация Laravel {{ $version->title }} - {{ $page->title }}@stop
@section('keywords'){{ \implode(', ', [...\preg_split('/\W+/u', $page->page), $page->title, 'Laravel ' . $version->title]) }}@stop

@push('header')
    @component('components.version-selector')
        @include('partials.version-selector', [
            'version' => $version
        ])
    @endcomponent
@endpush

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex flex-row">
            <div class="mr-4">
                <div class="docs_sidebar">
                    {!! $menuHtml !!}
                </div>
            </div>

            <div class="card-no-padding">
                @include('docs.partials.translation-status', [
                    'commitsAhead' => $page->original_commits_ahead
                ])

                <div class="px-4 pb-4">
                    <div class="docs_content">
                        {!! $pageHtml !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
