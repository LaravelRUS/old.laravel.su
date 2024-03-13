@extends('layout')
@section('type', "Работа")
@section('title', 'Поиск работы')

@section('content')

    <x-header image="/img/ui/job.svg">
        <x-slot:sup>Примените таланты</x-slot>
        <x-slot:title>Работа — это главное в жизни
            {{-- Работа не волк, в лес не убежит --}}</x-slot>

        <x-slot:description>
            Передайте проект на аутсорсинг или привлеките экспертов Laravel в свою существующую команду.
        </x-slot>

        <x-slot:actions>
            <a href="{{ route('position.create') }}"
               class="btn btn-primary btn-lg px-4">
                Опубликовать вакансию
            </a>
            <a href="{{ route('meets') }}"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">Мероприятия
                <x-icon path="i.arrow-right" class="bi" />
            </a>
        </x-slot>
    </x-header>

    <x-container>
        <turbo-frame id="positions-frame"
                     target="_top"
                     class="row g-4"
                     autoscroll="nearest"
                     data-autoscroll-block="nearest"
                     data-autoscroll-behavior="smooth">
            @include('positions.list')
        </turbo-frame>

        <div class="row g-4">
            @include('positions.pagination')
        </div>
    </x-container>

@endsection


