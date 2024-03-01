@extends('layout')
@section('title', 'Прошедшие челленджи')

@section('content')


        <x-header>
            <x-slot:sup>Было увлекательно</x-slot>
            <x-slot:title>Преведещие задания</x-slot>
            <x-slot:description>
                Выполняйте задания по программирования вместе с другими разработчиками,
                присоединившись к Кодицы 👇
            </x-slot>


        </x-header>

    <x-container>
        <div class="row g-4 justify-content-center align-items-start  position-relative mb-5">
            <div class="d-none d-xl-block col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        <x-icon path="i.previous_meetings"/>
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Предыдущие задания</h5>
                <p class="mb-0">{{-- Написать что-нибудь сюда --}}</p>
            </div>

            <div class="d-xl-none top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        <x-icon path="i.previous_meetings"/>
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Предыдущие задания</h5>
                <p class="mb-0">{{-- Написать что-нибудь сюда --}}</p>
            </div>
            <div class="col-xl-8">

                @foreach($past as $challenge)
                    <div class="col">
                        <div
                             class="d-flex flex-column justify-content-between bg-body-tertiary p-4 p-xl-5 rounded mb-4
     @if(isset($loop) && ($loop->iteration <= (3*intdiv($loop->count,3))))
     h-100
     @endif
     ">
                            <div >
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 text-primary">{{$challenge->presenter()->startDate()}} - {{$challenge->presenter()->stopDate()}}</p>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col">
                                        <h5 class="mb-0">{{ $challenge->presenter()->title }}</h5>
                                    </div>
                                </div>

                                <div class="line-clamp line-clamp-5 mb-3">
                                    {!! $challenge->presenter()->description() !!}
                                </div>
                            </div>


                            {{--
                            <div class="row">
                                <div class="col-12 col-sm-4 col-xl-3 mt-3 mt-sm-0">
                                    <div class="d-grid">
                                        <a class="btn btn-outline-primary" href="{{ $meet->link }}" target="_blank" rel="noopener">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>

                    </div>
                @endforeach

                {!! $past->links() !!}
            </div>
        </div>
    </x-container>
@endsection
