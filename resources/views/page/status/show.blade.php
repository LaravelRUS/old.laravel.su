@extends('layouts.master')

@section('title', 'Прогресс перевода документации Laravel')
@section('description', 'Прогресс перевода документации Laravel')

@section('content')
    @php
    /**
     * @var \App\Entity\Version[] $versions
     * @var \App\Entity\Version $current
     */
    @endphp

    <section class="container translation-progress">
        <h1>Прогресс перевода</h1>

        <p>
            Если вы хотите помочь с переводом документации, ознакомьтесь пожалуйста с этой
            <a href="{!! route('article', ['urn' => 'rus-documentation-contribution-guide']) !!}">инструкцией</a>.
        </p>

        @include('page.status.partials.menu')

        <article class="translation-progress-version">
            @if($current->isDocumented)
                <h2 id="laravel-{{ $current->name }}" class="translation-progress-visible">Laravel {{ $current->name }}</h2>
                <span class="translation-progress-description">Перевод показывается в меню</span>
            @else
                <h2 id="laravel-{{ $current->name }}" class="translation-progress-hidden">Laravel {{ $current->name }}</h2>
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
                            <a href="/docs/{{$current->name}}/{{$page->urn}}">{{ $page->title }}</a>
                            <span class="translation-page-description">/{{$current->name}}/{{ $page->urn }}</span>
                        </td>
                        <td class="translation-page-status">
                            @if ($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::MISSING)
                                <span class="label warning">Перевод отсутсвует</span>
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
                                <a href="https://github.com/laravel/docs/commit/{{ $page->translation->targetCommit }}" target="_blank">
                                    {{ substr($page->translation->targetCommit, 0, 7) }}
                                </a>
                            @else
                                Файл перевода отсутсвует
                            @endif
                            <hr />
                            @if($page->translation->commit)
                                Последний коммит
                                <a href="https://github.com/laravel/docs/commit/{{ $page->source->commit }}" target="_blank">
                                    {{ substr($page->source->commit, 0, 7) }}
                                </a>
                            @else
                                Данные страницы документации не обнаружены
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </article>
        
    </section>
@endsection
