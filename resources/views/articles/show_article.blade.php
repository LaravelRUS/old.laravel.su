@extends('layouts.master')

@section('title', $article->title)
@section('description', $article->description)

@push('header')
    @component('components.version-selector')
        @include('partials.version-selector')
    @endcomponent
@endpush

@section('content')
    <div class="container mx-auto px-4">
        <div class="card">
            <h1>{{$article->title}}</h1>

            <div class="docs_content">
                {!! $article->displayContentHtml() !!}
            </div>
        </div>
    </div>
@endsection


