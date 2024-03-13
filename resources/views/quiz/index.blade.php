@extends('html')
@section('title', __('quiz.page.title'))
@section('description', __('quiz.page.description'))

@section('body')

    <div class="container vh-100 d-flex align-content-center align-items-center">
        <div class="col-lg-6 mx-auto">
            <div id="quiz" class="p-4 p-xl-5 bg-body-secondary rounded position-relative">

                <h1 class="user-select-none text-center mb-3">
                    Раскрой секреты своего ремесла
                </h1>

                <div class="d-flex p-0">
                    <img src="{{ asset('/img/ivan.svg') }}" class="w-100 img-fluid">
                </div>

                <div class="px-sm-4 pt-0">
                    <div class="d-flex align-items-center mb-3">
                        <div class="col">
                            <p class="fw-normal mb-0">
                                Получите награду войдя первым в обновлённое сообщество. Событие ограничено временем - не упустите шанс, начните прямо сейчас!
                            </p>
                            <a href="{{route('stream.quiz.start')}}"
                               data-turbo-method="post"
                               class="btn btn-primary m-auto d-flex align-items-center justify-content-center w-100 mt-4">
                                Начать викторину
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4 text-center mb-lg-5">
                <a href="{{ route('home') }}" data-turbo-action="replace" class="link-body-emphasis text-decoration-none opacity-50">
                    Вернуться на главную
                </a>
            </div>

            <div class="modal modal-sheet fade" id="resetQuiz" data-bs-backdrop="static" tabindex="-1"
                 aria-labelledby="resetQuiz"
                 aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header align-items-baseline pb-0">
                            <h5 class="modal-title">{{ __('quiz.reset.title') }}</h5>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">
                                {{__('quiz.reset.description')}}
                            </p>
                        </div>
                        <div class="modal-footer flex-column flex-md-row align-items-stretch w-100 gap-2 pb-3">
                            <a href="{{route('quiz')}}"
                               class="btn btn-primary">{{ __('quiz.reset.yes') }}</a>
                            <button type="button" class="btn btn-link"
                                    data-bs-dismiss="modal"
                                    data-bs-target="#closeQuiz"
                                    data-bs-toggle="modal"
                            >{{ __('quiz.reset.no') }}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-sheet fade" id="closeQuiz" data-bs-backdrop="static" tabindex="-1"
                 aria-labelledby="closeQuiz"
                 aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header align-items-baseline pb-0">
                            <h5 class="modal-title">{{ __('quiz.close.title') }}</h5>
                            <button type="button" class="btn-close flex-shrink-0" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">
                                {!!__('quiz.close.description')!!}
                            </p>
                        </div>
                        <div class="modal-footer flex-column flex-md-row align-items-stretch w-100 gap-2 pb-3">

                            <a href="{{route('quiz')}}"
                               data-turbo-action="replace"
                               class="btn btn-primary d-flex align-items-center"
                               data-bs-target="#resetQuiz"
                               data-bs-toggle="modal"
                            >
                                <x-icon path="et.reset" class="ms-auto me-2"/>
                                <span class="me-auto">{{__('quiz.reset.button')}}</span>

                            </a>
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ __('quiz.close.no') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
