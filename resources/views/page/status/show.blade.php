@extends('layouts.master')

@section('title', 'Прогресс перевода Laravel ' . $current->name)
@section('description', 'Прогресс перевода Laravel' . $current->name)

@section('content')
    @php
    /**
     * @var \App\Entity\Version[] $versions
     * @var \App\Entity\Version $current
     */
    @endphp

    <section class="container translation-progress">
        <h1>Прогресс перевода Laravel {{ $current->name }}</h1>

        <p>
            Если вы хотите помочь с переводом документации, ознакомьтесь пожалуйста с этой
            <a href="{!! route('article', ['urn' => 'rus-documentation-contribution-guide']) !!}">инструкцией</a>.
        </p>

        @include('page.status.partials.menu')

        @if($current->isDocumented)
            <span class="translation-progress-description">Перевод показывается в меню</span>
        @else
            <span class="translation-progress-description">Перевод не показывается в меню, но доступен по прямой ссылке</span>
        @endif

        <table class="table-auto">
            <thead>
                <tr>
                    <th>Страница</th>
                    <th>Прогресс перевода</th>
                </tr>
            </thead>
            <tbody>
            @foreach($current->docs as $page)
                <tr class="translation-page-main">
                    <td>
                        @if ($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::MISSING)
                            <span>{{ $page->title }}</span>
                        @else
                            <a href="https://github.com/LaravelRUS/docs/blob/{{ $current->name }}/{{ $page->urn }}.md"
                               class="external" target="_blank" rel="nofollow">{{ $page->title }}</a>
                        @endif

                        <a href="{{ route('docs.show', ['version' => $current->name, 'page' => $page->urn]) }}"
                           class="translation-page-description">/{{$current->name}}/{{ $page->urn }}</a>
                    </td>
                    <td class="translation-page-status">
                        @if ($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::MISSING)
                            <span class="label warning">Перевод отсутствует</span>
                        @elseif($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::ACTUAL)
                            <span class="label success">Перевод актуален</span>
                        @else
                            <span class="label notice">
                                Перевод отстаёт на {{$page->translation->diff}}
                                {{ trans_choice('{1} коммит|[2,4] коммита|[5,*] коммитов', $page->translation->diff) }}
                            </span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="translation-page-info">
                        @if($page->translation->targetCommit)
                            Перевод ссылается на
                            <a href="https://github.com/laravel/docs/commit/{{ $page->translation->targetCommit }}" target="_blank" style="margin-right: 23px;">
                                {{ $page->translation->targetCommit }}
                            </a>
                        @else
                            <hr />
                            Файл перевода отсутствует
                        @endif

                        @if($page->source->commit)
                            <hr />
                            Последний коммит:
                            <a href="https://github.com/laravel/docs/commit/{{ $page->source->commit }}" target="_blank">
                                {{ $page->source->commit }}
                            </a>
                            <span class="copy_to_clipboard" data-clipboard-text="{{ $page->source->commit }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="clipboard_icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </span>
                        @else
                            <hr />
                            Оригинальный файл не найден
                        @endif

                        @if($page->translation->targetCommit AND $page->source->commit AND $page->translation->targetCommit != $page->source->commit)
                            <hr />
                            Непереведённый контент:
                            <span class="diff_command">
                                git difftool {{ substr($page->translation->targetCommit, 0, 7) }} {{ substr($page->source->commit, 0, 7) }} {{ $page->urn }}.md
                            </span>
                            <span class="copy_to_clipboard" data-clipboard-text="git difftool {{ substr($page->translation->targetCommit, 0, 7) }} {{ substr($page->source->commit, 0, 7) }} {{ $page->urn }}.md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="clipboard_icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                </svg>
                            </span>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        @include('page.status.partials.menu')

    </section>
@endsection
