@extends('html')
@section('title', 'Страница не найдена')

@section('body')
    <x-header image="/img/sign.svg">
        <x-slot:sup>Внимание, потенциальный хакер!</x-slot>
        <x-slot:title>Спроси себя</x-slot>

        <x-slot:description>
            Действительно ли готов к тому, чтобы провести следующие несколько часов, а возможно и
            дней, пытаясь взломать сайт, вместо того чтобы выйти на улицу и насладиться жизнью?
        </x-slot>

        <x-slot:actions>
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4">Ты прав. Пойду погуляю</a>
        </x-slot>
    </x-header>
@endsection
