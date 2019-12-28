@extends("layouts.docs")

@section("title", $article->title)
@section("description", $article->description)

@section("version_selector")
    @include("docs._version_selector", ['documentedVersions'=>[], 'versionTitle'=>""])
@endsection

@section("content")

    <div class="card">

        <h1>{{$article->title}}</h1>

        <div class="docs_content">

            {!! $article->displayContentHtml() !!}

        </div>

    </div>


@endsection


