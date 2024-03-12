@extends('layout')
@section('title', 'Ваш аккаунт заблокирован')

@section('content')
    <x-header image="/img/sign.svg">
        <x-slot:sup>Доступ запрещён</x-slot>
        <x-slot:title>Ваш аккаунт был заблокирован</x-slot>

        <x-slot:description>
            Ваш аккаунт был заблокирован в связи с нарушениями правил ресурса.
        </x-slot>
    </x-header>
@endsection
