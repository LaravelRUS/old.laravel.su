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
                    <p class="mb-0 text-balance">
                        Поздравляем! Ваш запрос был одобрен. Вы сможете использовать бесплатный ключ для Laravel IDEA и
                        раскрыть свой потенциал в разработке. Теперь у вас есть возможность создавать великолепные
                        проекты с помощью мощного инструмента.
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
                            <x-icon path="bs.copy" class="copy-action" data-controller="tooltip"
                                    title="Скопировать в буфер"/>
                            <x-icon path="bs.check2" class="copy-done" data-controller="tooltip" title="Скопировано"/>
                        </button>

                </div>

            </div>
                <div class="col-12">
                    <div class="p-4 bg-body-secondary rounded text-break user-select-all">
                        {{$key->key}}
                    </div>
                </div>
            </div>
        </div>

    </x-container>

    <x-call-to-action link="{{ route('docs') }}" text="Посмотреть документацию">
        <x-slot:title>Мы лишь прикоснулись к поверхности.</x-slot>

            <x-slot:description>
                В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
                ограничение скорости и пользовательские консольные команды.
                </x-slot>
    </x-call-to-action>

@endsection
