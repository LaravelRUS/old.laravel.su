@extends('layout')
@section('title', 'Статус перевода Laravel ' .$current)

@section('content')

    <x-header image="/img/porridge.svg">
        <x-slot:sup>Остаёмся на связи</x-slot>
        <x-slot:title>Статус перевода Laravel {{ $current }}</x-slot>

        <x-slot:description>
            Если вы хотите помочь с переводом документации — ознакомьтесь, пожалуйста с этой инструкцией.
        </x-slot>

        <x-slot:actions>
            <a href="{{ route('documentation-contribution-guide') }}" class="btn btn-primary btn-lg px-4">Инструкция по
                переводу</a>
            <a href="https://github.com/{{ config('services.github.repos.docs') }}"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">
                Репозиторий
                <x-icon path="i.arrow-right" class="bi"/>
            </a>
        </x-slot>
    </x-header>

    <x-container>
        <div class="col-xl-10 col-md-12 mx-auto">
            <div class="p-4 p-xl-5 mb-4 bg-body-secondary rounded-3 position-relative">
                <div class="row row-cols-md-4 g-3 justify-content-md-between text-center">
                    @foreach (\App\Docs::SUPPORT_VERSIONS as $version)
                        <div @class(['col', 'ms-auto' => !$loop->first])>
                            <a href="{{ route('status', ['version' => $version]) }}"
                                class="{{ $current === $version ? 'link-primary' : 'link-body-emphasis' }} text-decoration-none">
                                Laravel {{ $version }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-container>

    <x-container>
        <div class="row">
            <div class="col-xl-8 col-md-12 mx-auto text-xl-end text-center">
                <p class="mb-0">Актуально: {{ $documents->where('behind', 0)->count() }} из {{ $documents->count() }} <sup class="text-opacity-25">({{ round($documents->where('behind', 0)->count() / $documents->count() * 100, 2) }} %)</sup></p>
                <p>Правок без обновления: ~{{ $documents->sum('behind') }}</p>
            </div>


            <div class="col-xl-8 col-md-12 mx-auto">
                <div class="bg-body-tertiary mb-4 p-4 p-xl-5 rounded">

                    @foreach ($documents as $doc)
                        <div class="position-relative" id="{{ $doc->file }}">
                            <div class="d-flex flex-column flex-lg-row align-items-start mb-4">
                                <h5 class="mb-lg-0 me-auto user-select-all d-flex align-items-center">
                                    <a href="{{ $doc->getEditUrl() }}" target="_blank" class="link-body-emphasis small opacity-50 text-decoration-none me-2">
                                        <x-icon path="i.edit" class="bi" width="0.85rem" height="0.85rem"/>
                                    </a>

                                    {{ $doc->file }}
                                </h5>



                                @if ($doc->behind > 0)
                                    <a href="{{ App\Docs::compareLink($doc->version, $doc->current_commit) }}"
                                        target="_blank" class="me-3 d-block">
                                        <span
                                            class="badge bg-primary-subtle text-primary rounded rounded-1 fs-6 fw-normal">
                                            Отстаёт на {{ $doc->behind }} изменения</span>
                                    </a>
                                @else
                                    <span
                                        class="badge bg-success-subtle text-success rounded rounded-1 fs-6 fw-normal pe-none">Перевод
                                        актуален</span>
                                @endif
                            </div>

                            <div class="d-flex align-items-baseline mb-2 clipboard" data-controller="clipboard"
                                data-clipboard-done-class="done">
                                <span class="opacity-50 me-auto pe-none">Перевод ссылается:</span>
                                <small class="user-select-all me-2 col-4 col-md-auto text-truncate"
                                    data-clipboard-target="source">{{ $doc->current_commit }}</small>
                                <a href="#"
                                   data-action="clipboard#copy">
                                    <x-icon path="i.copy" class="copy-action" data-controller="tooltip" title="Скопировать в буфер" />
                                    <x-icon path="i.copy-fill" class="copy-done" data-controller="tooltip" title="Скопировано" />
                                </a>
                            </div>

                            <div class="d-flex align-items-baseline mb-2 clipboard" data-controller="clipboard"
                                data-clipboard-done-class="done">
                                <span class="opacity-50 me-auto pe-none">Последний коммит:</span>
                                <small class="user-select-all me-2 col-4 col-md-auto text-truncate"
                                    data-clipboard-target="source">{{ $doc->last_commit }}</small>
                                <a href="#" data-action="clipboard#copy" title="Скопировать в буфер обмена">
                                    <x-icon path="i.copy" class="copy-action" />
                                    <x-icon path="i.copy-fill" class="copy-done" />
                                </a>
                            </div>
                        </div>

                        @if (!$loop->last)
                            <hr class="m-5">
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </x-container>

@endsection
