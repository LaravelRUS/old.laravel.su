@extends('layout')
@section('title', 'Награды')

@section('content')

    <x-container>
        <div class="row">
            <div class="col-xl-8 col-md-12 mx-auto hotwire-frame">
                <div class="d-flex align-items-end justify-content-between mb-4">
                    <h4 class="fw-bold mb-0 text-body-emphasis">
                        Достижения
                    </h4>
                </div>
            </div>
        </div>
    </x-container>


   <x-container>
        <div class="row">
            <div class="col-xl-8 col-md-12 mx-auto ">
                <div class="bg-body-tertiary rounded overflow-hidden mb-4 p-4 p-xl-5">
                    @foreach($achievements as $achievement)
                        <div class="col d-flex text-body-secondary gap-4 @if(!$achievement->used) opacity-25 @endif mb-4">
                            <div class="col-lg-3">
                                <img src="{{ $achievement->image() }}" class="flex-shrink-0 rounded img-fluid">
                            </div>

                            <div class="mb-0 text-balance py-2">
                                <div class="d-block fw-bolder h3 fw-bolder mb-2">{{ $achievement->name() }}</div>
                                <p class="mb-0">{{ $achievement->description() }}</p>
                                <p>Имеют {{$achievement->percent}}% Пользователей</p>
                                @if($achievement->used)<span class="text-primary">Получено </span>@endif
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
   </x-container>
@endsection
