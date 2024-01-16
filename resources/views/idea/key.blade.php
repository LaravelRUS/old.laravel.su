@extends('layout')
@section('title', 'Laravel Idea Key')

@section('content')

    <x-header image="/img/ui/key.svg">
        <x-slot:sup>всё наглядно</x-slot>
            <x-slot:title>
                Бесплатный ключ Laravel IDEA для наших пользователей
                </x-slot>

                <x-slot:description>
                    Lorem ipsum dolor sit amet consectetur. Euismod in nunc sed nunc duis proin arcu arcu.
                    </x-slot>
    </x-header>

    <x-container>

        <div class="p-4 p-xl-5 bg-body-tertiary rounded-3 position-relative mb-4">
            <div class="row gx-5 gy-4 gy-md-5">
                <div class="col-md-6">
                    <p class="mb-0">
                        Русскоязычные участники из России, Белоруссии и Украины имеют возможность
                        получить бесплатный ключ.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end">
                        <button class="btn btn-link clipboard text-primary fw-semibold text-decoration-none" data-controller="clipboard"
                                data-action="clipboard#copy"
                                data-clipboard-done-class="done">

                            Копировать в буффер обмена

                            <span class="d-none"
                                  data-clipboard-target="source">{{ $key->key }}</span>
                            <x-icon path="bs.copy" class="copy-action" data-controller="tooltip"
                                    title="Скопировать в буфер"/>
                            <x-icon path="bs.check2" class="copy-done" data-controller="tooltip" title="Скопировано"/>
                        </button>

                </div>

            </div>
                <div class="col-12">
                    <div class="p-4 bg-body-secondary rounded text-break">

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
