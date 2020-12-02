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
        <h1>Прогрес перекладу Laravel {{ $current->name }}</h1>

        <p>
            Если вы хотите помочь с переводом документации, ознакомьтесь пожалуйста с этой
            <a href="{!! route('article', ['urn' => 'rus-documentation-contribution-guide']) !!}">инструкцией</a>.
        </p>

        @include('page.status.partials.menu')

        @if($current->isDocumented)
            <span class="translation-progress-description">Переклад відображається в меню</span>
        @else
            <span class="translation-progress-description">Переклад не відображається в меню, але доступний по прямому посиланню</span>
        @endif

        <table class="table-auto">
            <thead>
                <tr>
                    <th>Страница</th>
                    <th>Прогрес перекладу</th>
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
                            <span class="label warning">Переклад відсутній</span>
                        @elseif($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::ACTUAL)
                            <span class="label success">Переклад актуальний</span>
                        @else
                            <span class="label notice">
                                Переклад відстає на {{$page->translation->diff}}
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
                            Файл Перекладу відсутній
                        @endif
                        <hr />
                        @if($page->translation->commit)
                            Останній комміт
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


        @include('page.status.partials.menu')

    </section>
@endsection
