@extends('html')
@section('title', 'На дне')

@section('body')

    <div class="vh-100 d-flex flex-column">
        <main data-controller="hangman" class="position-relative">

            <div class="gap-4 d-flex position-absolute top-0 end-0 p-5 text-primary" data-hangman-target="hearts">
                <x-icon path="i.heart-fill" width="2rem" height="2rem"/>
                <x-icon path="i.heart-fill" width="2rem" height="2rem"/>
                <x-icon path="i.heart-fill" width="2rem" height="2rem"/>
                <x-icon path="i.heart-fill" width="2rem" height="2rem"/>
            </div>

            <div class="container d-none d-md-block" data-hangman-target="image">
                <img src="/img/hangman/pit-4.svg" data-status="4"
                     class="pe-none img-fluid d-block mx-auto d-none hangman">
                <img src="/img/hangman/pit-3.svg" data-status="3"
                     class="pe-none img-fluid d-block mx-auto d-none hangman">
                <img src="/img/hangman/pit-2.svg" data-status="2"
                     class="pe-none img-fluid d-block mx-auto d-none hangman">
                <img src="/img/hangman/pit-1.svg" data-status="1"
                     class="pe-none img-fluid d-block mx-auto d-none hangman">
                <img src="/img/hangman/pit-lose.svg" data-status="lose"
                     class="pe-none img-fluid d-block mx-auto d-none hangman">
                <img src="/img/hangman/pit-win.svg" data-status="win"
                     class="pe-none img-fluid d-block mx-auto d-none hangman">
            </div>

            <x-header image="/img/sign.svg">
                <x-slot:sup>Спасай себя сам</x-slot>
                    <x-slot:title>На дне</x-slot>
                        <x-slot:description>
                            Тебе предстоит отгадывать слова связанные с разработкой и конечно Laravel, угадывай буквы,
                            чтобы
                            избежать погружения в мрак адских технологий.
                        </x-slot:description>
                        <x-slot:actions>
                            <div
                                class="d-none gap-3 d-md-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                                <div class="">
                                    <input type="text" class="form-control" placeholder="Введите букву"
                                           data-hangman-target="hangmanInput" data-action="hangman#guess">
                                </div>

                                <button type="button" data-action="hangman#startGame"
                                        class="btn btn-link link-body-emphasis text-decoration-none icon-link icon-link-hover">
                                    Начать сначала
                                    <x-icon path="i.arrow-right" class="bi"/>
                                </button>
                            </div>
                        </x-slot:actions>
                        <x-slot:content>
                            <div class="d-none">
                                <audio data-hangman-target="audioWrong">
                                    <source src="/sound/hangman/wrong.mp3" type="audio/mp3">
                                </audio>
                                <audio data-hangman-target="audioLose">
                                    <source src="/sound/hangman/lose.mp3" type="audio/mp3">
                                </audio>
                                <audio data-hangman-target="audioWin">
                                    <source src="/sound/hangman/win.mp3" type="audio/mp3">
                                </audio>
                            </div>

                            <div class="position-relative text-center text-md-start mb-3 mb-md-0">
                                <span class="opacity-50">Слово:</span>
                                <h2 data-hangman-target="word" style="letter-spacing: 1.5rem;"
                                    class="text-primary text-uppercase"></h2>
                                <p data-hangman-target="attempts" class="d-none"></p>
                                <p data-hangman-target="log" class="text-balance"></p>
                            </div>

                            <div
                                class="d-block d-md-none gap-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                                <div class="">
                                    <input type="text" class="form-control" inputmode="text" placeholder="Введите букву"
                                           data-hangman-target="hangmanInput" data-action="focus->hangman#clearInput hangman#guess">
                                </div>

                                <button type="button" data-action="hangman#startGame"
                                        class="btn btn-link link-body-emphasis text-decoration-none icon-link icon-link-hover opacity-50 mt-4 mx-auto">
                                    Попробовать снова
                                </button>
                            </div>
                        </x-slot:content>
            </x-header>
        </main>

        <x-container class="mt-auto">
            <div class="row align-items-center">
                <div class="col-5">
                    <div class="d-flex align-items-center" data-controller="sound-toggle">
                        <button class="btn btn-link text-primary text-decoration-none ps-0"
                                data-sound-toggle-target="muteButton" data-action="click->sound-toggle#toggle">
                            <x-icon path="bs.volume-mute-fill" width="2rem" height="2rem"/>
                        </button>

                        <button class="btn btn-link text-primary text-decoration-none ps-0"
                                data-sound-toggle-target="unmuteButton" data-action="click->sound-toggle#toggle"
                                id="unmuteButton">
                            <x-icon path="bs.volume-up-fill" width="2rem" height="2rem"/>
                        </button>

                        <code class="opacity-75 h5 text-primary mb-0"><%%%%|==========></code>
                    </div>
                </div>

                <div class="col-auto col-md-auto ms-auto">
                    <div class="navbar navbar-dark">
                        <div class="nav flex-column">
                            <form data-controller="theme" data-action="change->theme#toggleTheme" data-turbo-permanent
                                  class="btn-group" role="group" aria-label="Тема оформления" id="theme-checker-group">
                                <input type="radio" value="auto" data-theme-target="preferred" class="btn-check"
                                       name="theme-checker" id="theme-checker-auto" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary d-inline-flex align-items-center py-2"
                                       for

                                       ="theme-checker-auto">
                                    <x-icon path="i.theme-auto" class="my-1" width="1rem" height="1rem"/>
                                </label>

                                <input type="radio" value="light" data-theme-target="preferred" class="btn-check"
                                       name="theme-checker" id="theme-checker-light" autocomplete="off">
                                <label class="btn btn-outline-secondary d-inline-flex align-items-center"
                                       for="theme-checker-light">
                                    <x-icon path="i.theme-light" class="my-1" width="1rem" height="1rem"/>
                                </label>

                                <input type="radio" value="dark" data-theme-target="preferred" class="btn-check"
                                       name="theme-checker" id="theme-checker-dark" autocomplete="off">
                                <label class="btn btn-outline-secondary d-inline-flex align-items-center"
                                       for="theme-checker-dark">
                                    <x-icon path="i.theme-dark" class="my-1" width="1rem" height="1rem"/>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </div>
@endsection

