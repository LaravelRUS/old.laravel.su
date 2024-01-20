@extends('layout')
@section('type', "Работа")
@section('title', 'Поиск работы')

@section('content')

    <x-header image="/img/ui/job.svg">
        <x-slot:sup>Примените таланты</x-slot>
        <x-slot:title>Работа</x-slot>

        <x-slot:description>
            Передайте проект на аутсорсинг или привлеките экспертов Laravel в свою существующую команду.
        </x-slot>

        <x-slot:actions>
            <a href="{{ route('position.create') }}"
               class="btn btn-primary btn-lg px-4">
                Опубликовать вакансию
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
