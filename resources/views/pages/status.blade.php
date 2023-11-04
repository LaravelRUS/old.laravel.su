@extends('layout')
@section('title', 'Статус переводов')

@section('content')


    <x-header image="/img/sign.svg">
        <x-slot:sup>Остаёмся на связи</x-slot>
        <x-slot:title>Статус перевода Laravel {{ $current }}</x-slot>

        <x-slot:description>
            Если вы хотите помочь с переводом документации — ознакомьтесь, пожалуйста с этой инструкцией.
        </x-slot>

        <x-slot:actions>
            <a href="{{ route('documentation-contribution-guide') }}" class="btn btn-primary btn-lg px-4">Инструкция по переводу</a>
        </x-slot>
    </x-header>



    <div class="container my-5">
        <div class="col-xl-10 col-md-12 mx-auto">
            <div class="p-5 mb-4 bg-body-secondary rounded-3 position-relative">
                <div class="row row-cols-md-4 g-3">
                    @foreach(\App\Docs::SUPPORT_VERSION as $version)
                        <div class="col">
                            <a href="{{ route('status', ['version' => $version]) }}"
                               class="{{ $current === $version ? 'link-primary' : 'link-body-emphasis' }} text-decoration-none">
                                Laravel {{ $version }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <div class="col-xl-7 col-md-12 mx-auto">
                <div class="bg-body-tertiary mb-4 p-5">

                    @foreach($documents as $doc)

                        <div class="position-relative" id="{{ $doc->file }}">
                            <div class="d-flex align-items-start mb-4">
                                <h5 class="mb-0 me-auto">{{ $doc->file }}</h5>

                                @if($doc->translationIsLagsBehind())
                                    <a href="{{ App\Docs::compareLink($doc->version, $doc->current_commit) }}" target="_blank" class="me-3 d-block">
                                        <span class="badge bg-primary-subtle text-primary rounded rounded-1 fs-6 fw-normal">Перевод отстаёт на {{ $doc->count_commits_behind }} изменения</span>
                                    </a>
                                @else
                                    <span class="badge bg-success-subtle text-success rounded rounded-1 fs-6 fw-normal pe-none">Перевод актуален</span>
                                @endif
                            </div>

                            <div class="d-flex align-items-baseline mb-2 clipboard" data-controller="clipboard" data-clipboard-done-class="done">
                                <span class="opacity-50 me-auto">Перевод ссылается:</span>
                                <small class="user-select-all me-2" data-clipboard-target="source">{{ $doc->current_commit }}</small>
                                <a href="#" data-action="clipboard#copy" title="Скопировать в буфер обмена">
                                    <x-icon path="bs.clipboard" class="copy-action"/>
                                    <x-icon path="bs.check2" class="copy-done"/>
                                </a>
                            </div>

                            <div class="d-flex align-items-baseline mb-2 clipboard" data-controller="clipboard" data-clipboard-done-class="done">
                                <span class="opacity-50 me-auto">Последний коммит:</span>
                                <small class="user-select-all me-2" data-clipboard-target="source">{{ $doc->last_commit }}</small>
                                <a href="#" data-action="clipboard#copy" title="Скопировать в буфер обмена">
                                    <x-icon path="bs.clipboard" class="copy-action"/>
                                    <x-icon path="bs.check2" class="copy-done"/>
                                </a>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <hr class="m-5">
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

    </div>

@endsection
