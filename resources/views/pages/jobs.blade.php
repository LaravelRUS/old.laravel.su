@extends('layout')
@section('title', 'Поиск работы')

@section('content')


    <x-header image="/img/ui/jewelry.svg">
        <x-slot:sup>Остаёмся на связи</x-slot>
        <x-slot:title>Работа</x-slot>

        <x-slot:description>
            Передайте проект на аутсорсинг или привлеките экспертов Laravel в свою существующую команду.
        </x-slot>

        <x-slot:actions>
            <a href="{{ route('packages') }}"
               class="link-body-emphasis text-decoration-none link-icon-animation">Опубликовать вакансию
                <x-icon path="bs.arrow-right" />
            </a>
        </x-slot>
    </x-header>

<x-container>
    <div class="row g-4">
        @foreach(range(1, 10) as $i)
            <div class="col-12">
                <div class="bg-body-secondary bg-body-secondary-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                    <div class="d-flex align-items-center col-md-4">
                        <div class="avatar avatar-xl">
                            <img src="https://play-lh.googleusercontent.com/ADApjX-HvYOpnB4jqpe7UwzTL_sVs5_c8mv0H1ph4b1RYEu7qeXOpQuKdHmWBomv_2I" class="avatar-img rounded-3 shadow bg-white" alt="">
                        </div>

                        <div class="ms-3 me-auto">
                            <a href="#" class="h5 link-body-emphasis">Летуаль</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                        <span class="badge bg-soft-primary rounded-pill">Полный рабочий день</span>
                        <span class="text-muted d-flex align-items-center fw-medium mt-md-2">
                            <x-icon path="bs.clock" class="me-2"/>
                            2 дня назад
                        </span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                        <span class="text-muted d-flex align-items-center">
                            <x-icon path="bs.geo-alt-fill" class="me-2"/>
                            Москва
                        </span>
                        <span class="d-flex fw-medium mt-md-2">30 000 - 110 000 ₽</span>
                    </div>

                    <div class="mt-3 mt-md-0">
                        <a href="#" class="btn btn-sm btn-primary w-full ms-md-1">Посмотреть</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-container>

@endsection
