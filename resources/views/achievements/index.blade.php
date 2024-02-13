@extends('layout')
@section('title', 'Награды')

@section('content')

    <x-header image="/img/ui/job.svg">
        <x-slot:sup>какой-то текст </x-slot>
        <x-slot:title>Достижения
            {{-- Работа не волк, в лес не убежит --}}</x-slot>

        <x-slot:description>
            Делайте публикации, оставляйте комментарии и получайте награды
        </x-slot>

    </x-header>

    <x-container >
        <div class="bg-body-tertiary rounded overflow-hidden mb-4 p-4 p-xl-5">
            <div class="row g-4 row-cols-1 row-cols-md-2">
                @foreach($achievements as $achievement)
                    <div class="col d-flex text-body-secondary gap-4 @if(!$achievement->used) opacity-25 @endif">
                        <div class="col-lg-3">
                            <img src="{{ $achievement->image() }}" class="flex-shrink-0 rounded img-fluid">
                        </div>

                        <div class="mb-0 text-balance py-2">
                            <div class="d-block fw-bolder h3 fw-bolder mb-2">{{ $achievement->name() }}</div>
                            <p class="mb-0">{{ $achievement->description() }}</p>
                            <p>Это достижение есть у {{$achievement->percent}}% пользователей</p>
                            @if($achievement->used)<span class="text-primary">Получено </span>@endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>




    </x-container>

@endsection


