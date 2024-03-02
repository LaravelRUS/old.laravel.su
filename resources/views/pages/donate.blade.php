@extends('layout')
@section('title', 'Использование редактора')

@section('content')

    <x-header image="/img/ui/carpet.svg">
        <x-slot:sup>Ваша помощь держит нас на ковре</x-slot>
        <x-slot:title>Поддержите крутой проект</x-slot>

        <x-slot:description>
            Благодаря вашей помощи на проекте проявляются конкурсы, поддерживаются актуальные переводы и пишутся статьи.
        </x-slot>

        <x-slot:actions>
            <a href="№" class="btn btn-primary btn-lg px-4">Сделать пожертвование</a>
        </x-slot>
    </x-header>

    <x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                <div class="col-xxl-8 mx-auto">
                    <main data-controller="prism">

                        <h2>Способы поддержки</h2>
                        <p>Есть много способов внести свой вклад в русскоязычное сообщество Laravel,
                           не имея технических навыков или навыков программирования, которые также способствуют продвижению Laravel.</p>
                    </main>
                </div>
            </div>
        </div>
    </x-container>

    @include('particles.sponsors')

@endsection
