@extends('layout')
@section('title', 'Команда')

@section('content')

    <x-header image="/img/bird.svg" align="align-items-start">
        <x-slot:sup>Каждый рок звезда</x-slot>
        <x-slot:title>Мы делаем сообщество лучше.</x-slot>

        <x-slot:description>
            Сообщество совершенствуется с каждым годом благодаря работе десятков добровольцев, вносящих большой и малый
            вклад. Каждый может помочь сделать эту платформу лучше, независимо от того, использует ли он ее с
            самого основания или начал только вчера.
        </x-slot>

        <x-slot:content>
            <div class="row g-4 g-md-5 row-cols-3 row-cols-lg-4 text-center justify-content-center">
                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&1" style="filter:grayscale(100%)">

                    <h6 class="mt-2 small"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&6" style="filter:grayscale(100%)">

                    <h6 class="mt-2 small"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&5" style="filter:grayscale(100%)">

                    <h6 class="mt-2 small"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&8" style="filter:grayscale(100%)">

                    <h6 class="mt-2 small"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&3" style="filter:grayscale(100%)">

                    <h6 class="mt-2 small"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&9" style="filter:grayscale(100%)">

                    <h6 class="mt-2 small"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&7" style="filter:grayscale(100%)">

                    <h6 class="mt-2 small"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&2" style="filter:grayscale(100%)">

                    <h6 class="mt-2 small"><strong>Дмитрий Будко</strong></h6>
                </div>
            </div>
        </x-slot:content>

    </x-header>

    <x-call-to-action link="{{ route('docs') }}" text="Внесите свой вклад на GitHub">
        <x-slot:title>Вы можете сделать сообщество ещё лучше.</x-slot>

        <x-slot:description>
            В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
            ограничение скорости и пользовательские консольные команды.
        </x-slot>

    </x-call-to-action>
@endsection
