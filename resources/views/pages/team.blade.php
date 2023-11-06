@extends('layout')
@section('title', 'Статус переводов')

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
            <div class="row gy-5 row-cols-lg-4 text-center justify-content-center">
                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&1" style="filter:grayscale(100%)">

                    <h6 class="mt-2"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&6" style="filter:grayscale(100%)">

                    <h6 class="mt-2"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&5" style="filter:grayscale(100%)">

                    <h6 class="mt-2"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&8" style="filter:grayscale(100%)">

                    <h6 class="mt-2"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&3" style="filter:grayscale(100%)">

                    <h6 class="mt-2"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&9" style="filter:grayscale(100%)">

                    <h6 class="mt-2"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&7" style="filter:grayscale(100%)">

                    <h6 class="mt-2"><strong>Дмитрий Будко</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&2" style="filter:grayscale(100%)">

                    <h6 class="mt-2"><strong>Дмитрий Будко</strong></h6>
                </div>
            </div>
        </x-slot:content>

    </x-header>

    {{--
    <div class="container py-5">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-8">
                <h1 class="display-3 mb-3 lh-1">
                    Познакомьтесь с командой
                </h1>

                <p class="fs-lg mb-6 mb-md-8">
                    Направление сообщества контролируется этими людьми. Эта группа постоянных участников управляет
                    выпусками, оценивает запросы на включение, обрабатывает жалобы на поведение и делает большую часть
                    работы над основными новыми функциями.
                </p>
            </div>
        </div>

        <div class="row g-5 row-cols-6 text-center justify-content-center">
            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&1">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&6">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&5">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&8">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&3">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&9">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&7">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&2">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&3">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&9">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&7">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                    src="https://xsgames.co/randomusers/avatar.php?g=male&2">

                <h6 class="my-2"><strong>Дмитрий Будко</strong></h6>
                <p>Автор популярных пакетов</p>
            </div>
        </div>

    </div>
    --}}


    <x-call-to-action link="{{ route('docs') }}" text="Внесите свой вклад на GitHub">
        <x-slot:title>Вы можете сделать сообщество ещё лучше.</x-slot>

        <x-slot:description>
            В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
            ограничение скорости и пользовательские консольные команды.
        </x-slot>

    </x-call-to-action>
@endsection
