@extends('html')
@section('title', 'Ваш аккаунт заблокирован')

@section('body')
    <x-header image="/img/sign.svg">
        <x-slot:sup>Доступ запрещён</x-slot>
        <x-slot:title>Ваш аккаунт был заблокирован</x-slot>

        <x-slot:description>
            Ваш аккаунт был заблокирован в связи с нарушениями правил ресурса.
        </x-slot>

        {{--
             <x-slot:actions>
                 <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4">Вернуться домой</a>
             </x-slot>
         --}}
    </x-header>
@endsection
