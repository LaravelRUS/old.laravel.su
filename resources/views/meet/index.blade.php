@extends('layout')
@section('title', 'Реклама')

@section('content')

    @if($past->currentPage() === 1)
        <x-header>
            <x-slot:sup>Нельзя пропустить</x-slot>
            <x-slot:title>Не обойдется без Laravel</x-slot>
            <x-slot:description>
                Ни одна PHP конференция не обходится без упоминания Laravel.
                Это самый популярный фреймворк в мире PHP.
            </x-slot>

            @if($most)
                <x-slot:content>
                    <div class="bg-dark-subtle dashed p-4 rounded position-relative">
                        <a href="{{ $most->link }}" class="position-absolute start-0 end-0 top-0 bottom-0 z-1"></a>

                        <div class="row g-4 justify-content-between align-items-center">
                            <div class="col-sm-7">
                                <div class="row g-3">

                                    <div class="col-12">
                                        <h4 class="mb-0">{{ $most->name }}</h4>
                                    </div>

                                    <!-- Date -->
                                    <div class="col-6">
                                        <small class="text-muted">Дата</small>
                                        <h6>{{ $most->start_date->isoFormat('DD MMMM', 'Do MMMM') }}</h6>
                                    </div>
                                    <!-- Time -->
                                    <div class="col-6">
                                        <small class="text-muted">Время</small>
                                        <h6>Начало в {{ $most->start_date->isoFormat('hh:mm', 'Do MMMM') }}</h6>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-12">
                                        <small class="text-muted">Адрес</small>
                                        <h6>{{ $most->address }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center">
                                <div class="ticket-border">
                                    <!-- QR code -->
                                    <img class="img-fluid mx-auto user-select-none rounded" src="https://chart.googleapis.com/chart?cht=qr&chl={{ urlencode($most->link) }}&chs=500x500" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot:content>
            @endif
        </x-header>

        <div class="container py-5">
            <div class="row row-cols-lg-3 gy-0 position-relative">
                @foreach($actual as $meet)
                    <div class="col position-relative">
                        @if($loop->first)
                            <figure class="position-absolute top-0 start-0 translate-middle z-n1 ms-4">
                                <x-icon path="l.cube" width="46" height="53" fill="none"/>
                            </figure>
                        @endif
                        @include('particles.meet', ['meet' => $meet])
                    </div>
                @endforeach

                @if($actual->count() % 3 !== 0)
                    <x-icon path="l.dots" class="text-primary opacity-2 opacity-25 col" height="400" width="100%" />

                    @if($actual->count() % 4 === 0)
                        <x-icon path="l.dots" class="text-primary opacity-2 opacity-25 col" height="400" width="100%" />
                    @endif
                @endif
            </div>
        </div>
    @endif


    <div class="container py-5">
        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Прошедшие конференции</h5>
                <p class="mb-0">Чтобы вы не сожалели о пропущенных конференциях, мы оставили записи с этих событий.</p>
            </div>
            <div class="col-xl-8 text-center text-xl-start">

                @foreach($past as $meet)
                    <div class="col">
                        @include('particles.meet', ['meet' => $meet])
                    </div>
                @endforeach

                {!! $past->links() !!}
            </div>
        </div>

    </div>
@endsection
