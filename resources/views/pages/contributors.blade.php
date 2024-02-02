@extends('layout')
@section('title', 'Участники')

@section('content')

    <x-header image="/img/bird.svg" align="align-items-start">
        <x-slot:sup>Каждый рок звезда</x-slot>
        <x-slot:title>Все делают сообщество лучше.</x-slot>

        <x-slot:description>
            Сообщество совершенствуется с каждым годом благодаря работе десятков добровольцев, вносящих большой и малый
            вклад. Каждый может помочь сделать эту платформу лучше, независимо от того, использует ли он ее с
            самого основания или начал только вчера.
        </x-slot>

        <x-slot:content>

            <div class="row g-4 g-md-5 row-cols-3 row-cols-lg-3 text-center justify-content-center"  style="filter:grayscale(100%)">

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="/img/team/butochnikov.jpg">

                    <h6 class="mt-2 small"><strong>Алексей Буточников</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="/img/team/nesmiyanov.jpg">

                    <h6 class="mt-2 small"><strong>Кирилл Несмеянов</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="/img/team/skirta.jpg">

                    <h6 class="mt-2 small">
                        <strong>Дмитрий Скирта</strong>
                    </h6>
                    {{--
                    <small class="opacity-75">Воплощает визуальную мечту в реальность</small>
                    --}}
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="/img/team/gosteva.jpg">

                    <h6 class="mt-2 small">
                        <strong>Надежда Гостева</strong>
                    </h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="/img/team/chernayev.jpeg">

                    <h6 class="mt-2 small"><strong>Александр Черняев</strong></h6>
                </div>

                <div class="col">
                    <img alt="image" class="img-fluid rounded-circle mb-3"
                         src="/img/team/chubarov.jpg">

                    <h6 class="mt-2 small"><strong>Илья Чубаров</strong></h6>
                </div>
            </div>
        </x-slot:content>

    </x-header>

    <x-call-to-action link="https://github.com/laravel-russia" text="Внесите свой вклад на GitHub">
        <x-slot:title>Но вы можете сделать сообщество ещё лучше!</x-slot>

        <x-slot:description>
            С вашим участием и энергией, вы можете вдохнуть новую жизнь в сообщество и внести положительные перемены для всех его членов.
        </x-slot>

    </x-call-to-action>
@endsection
