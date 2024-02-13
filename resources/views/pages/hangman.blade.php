@extends('html')
@section('title', 'Колица')

@section('body')
    <main data-controller="hangman">
        <x-header image="/img/sign.svg">
            <x-slot:sup>Не попади на кол</x-slot>
            <x-slot:title>Колица</x-slot>

            <x-slot:description>
                Тебе предстоит отгадывать слова связанные с разработкой и конечно Laravel, угадывая буквы, чтобы
                избежать "попадания на кол".
            </x-slot>

             <x-slot:actions>
                    <div class="">
                        <input type="text" class="form-control" placeholder="Введите букву"
                               data-hangman-target="hangmanInput" data-action="hangman#guess">
                    </div>

                    <button type="button" data-action="hangman#startGame"
                            class="btn btn-link link-body-emphasis text-decoration-none icon-link icon-link-hover">
                        Начать сначала
                        <x-icon path="i.arrow-right" class="bi"/>
                    </button>
             </x-slot>

             <x-slot:content>
                        <div class="position-relative">

                            <span class="text-opacity-50">Слово:</span>
                            <h2 data-hangman-target="word" style="letter-spacing: 1.5rem;"
                                class="text-primary"></h2>

                            <p data-hangman-target="attempts"></p>
                        </div>
             </x-slot:content>
        </x-header>
    </main>
@endsection
