@extends('layouts.docs')

@section('title', $metaTitle)
@section('description', $metaDescription)

@section('version_selector')
    @include('partials.version-selector', [
        'documentedVersions' => $documentedVersions,
        'versionTitle' => $versionTitle
    ])
@endsection

@section('content')
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
@endsection
