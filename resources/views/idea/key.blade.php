@extends('layout')
@section('title', 'Laravel Idea Key')

@section('content')

    <x-header image="/img/ui/key.svg">
        <x-slot:sup>Вас запрос одобрен</x-slot>
        <x-slot:title>
            Ваш персональный ключ
        </x-slot>

        <x-slot:description>
            Приступайте к созданию магии с помощью Laravel IDEA и достигайте невероятных высот в области веб-разработки!
       </x-slot>
    </x-header>

    <x-container>

        <div class="p-4 p-xl-5 bg-body-tertiary rounded-3 position-relative mb-4">
            <div class="row gy-4 align-items-end">
                <div class="col-md-6">
                    <p class="text-balance">
                        Поздравляем! Ваш запрос одобрен.
                        Активируйте ключ для Laravel IDEA и создавайте
                        великолепные проекты.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end">
                        <button class="btn btn-link clipboard text-primary fw-semibold text-decoration-none" data-controller="clipboard"
                                data-action="clipboard#copy"
                                data-clipboard-done-class="done">

                            Копировать в буфер обмена

                            <span class="d-none"
                                  data-clipboard-target="source">{{ $key->key }}</span>
                            <x-icon path="i.copy" class="copy-action" data-controller="tooltip"
                                    title="Скопировать в буфер"/>
                            <x-icon path="i.copy-fill" class="copy-done" data-controller="tooltip" title="Скопировано"/>
                        </button>
                </div>
                    <div class="p-4 bg-body-secondary rounded text-break user-select-all">
                        {{$key->key}}
                    </div>
                </div>
            </div>
        </div>

        <p class="text-center opacity-50">Учтите, что ключ предназначен
            <a href="https://www.jetbrains.com/store/redeem/?plugins=&product=PLARAVEL" rel="noreferrer"
               target="_blank">для активации в JetBrains</a>
           на территории RU,
           BY, UA.</p>
    </x-container>


@endsection
