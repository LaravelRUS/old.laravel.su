@extends('layout')
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
               class="link-body-emphasis text-decoration-none link-icon-animation">Опубликовать вакансию
                <x-icon path="bs.arrow-right" />
            </a>
        </x-slot>
    </x-header>

<x-container>

        <turbo-frame class="row g-4" id="positions-frame" target="_top" src="{{route('positions')}}">

            @foreach(range(0,2) as $placeholder)
                <div class="col-12 position-placeholder" >
                    <div
                        class="row bg-body-tertiary shadow rounded p-4 d-md-flex align-items-center justify-content-between">

                        <div class="d-flex align-items-center col-md-2">
                            <span class="placeholder rounded w-100"></span>
                        </div>
                        <div class="col-md-3 mt-2 mt-md-0">
                            <span class="placeholder rounded w-100"></span>
                            <span class="placeholder rounded w-100"></span>

                        </div>

                        <div class="d-flex align-items-center justify-content-between   d-md-block mt-3 mt-md-0 col-md-3">
                            <span class="placeholder rounded w-100"></span>
                            <span class="placeholder rounded w-100"></span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between  d-md-block mt-2 mt-md-0 col-md-2">
                            <span class="placeholder rounded w-100"></span>
                            <span class="placeholder rounded w-100"></span>
                        </div>

                        <div class="col-md-2 mt-3 mt-md-0 text-center text-md-end">
                            <span class="placeholder rounded w-100"></span>
                        </div>

                    </div>

                </div>
            @endforeach

        </turbo-frame>


        <div id="positions-more"></div>
    </div>
</x-container>

@endsection
