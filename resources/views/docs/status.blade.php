@extends('layouts.master')

@section('title', 'Прогресс перевода документации Laravel')
@section('description', 'Прогресс перевода документации Laravel')

@push('header')
    @component('components.version-selector')
        @include('partials.version-selector')
    @endcomponent
@endpush

@section('content')
    @php /** @var $version \App\Model\FrameworkVersion */ @endphp

    <div class="container mx-auto px-4">
        <div class="text">
            <div class="card">
                <div class="">
                    <h1 class="title-1">Прогресс перевода</h1>
                </div>

                <p>
                    Если вы хотите помочь с переводом документации, ознакомьтесь пожалуйста с этой
                    <a href="/articles/rus-documentation-contribution-guide" class="link">инструкцией</a>.
                </p>

                @foreach($versions as $version)

                    <div class="mb-8">
                        <div class="flex flex-row items-baseline mb-8">
                            <h2 class="mb-0">
                                <a href="https://github.com/laravel/docs/tree/{{ $version->title }}">Ветка {{ $version->title }}</a>
                            </h2>
                            <div class="ml-4">
                                @if($version->is_documented)
                                    <span class="text-green-600">показывается на сайте</span>
                                @else
                                    <span class="text-orange-500">перевод не показывается в меню, но доступен по прямой ссылке</span>
                                @endif
                            </div>
                        </div>
                        <table class="table-auto">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Наименование</th>
                                <th>Оригинал</th>
                                <th>Прогресс перевода</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($version->documentation as $i => $doc)
                                <tr>
                                    <td class="text-center">{{ $i + 1 }}</td>
                                    <td>
                                        <a class="link"
                                           href="/docs/{{$version->title}}/{{$doc->page}}">{{ $doc->page }}</a>
                                    </td>
                                    <td>
                                        <a class="link"
                                           href="https://github.com/laravel/docs/blob/{{ $doc->current_original_commit }}/{{ $doc->page }}.md">
                                            {{ $doc->current_original_commit }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="flex flex-row">
                                            @if($doc->last_original_commit === null)
                                                <div class="w-6">&nbsp;</div>
                                                <div class="text-red-500"><i class="fa fa-circle"></i> перевод
                                                    отсутствует
                                                </div>
                                            @else
                                                @if( ! $doc->original_commits_ahead)
                                                    <div class="w-6">&nbsp;</div>
                                                    <div class="text-green-500"><i class="fa fa-circle"></i> перевод не
                                                        требуется
                                                    </div>
                                                @else
                                                    <div class="w-6 text-red-500 font-bold"><i
                                                                class="fa fa-circle"></i> {{ $doc->original_commits_ahead }}
                                                    </div>
                                                    <div>git
                                                        difftool {{ substr($doc->last_original_commit, 0, 7) }} {{ substr($doc->current_original_commit, 0, 7) }} {{ $doc->page }}
                                                        .md
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
