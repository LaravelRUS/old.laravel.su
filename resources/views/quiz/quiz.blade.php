@if ($quiz->finish)

    <turbo-stream target="quiz" action="update">
        <template>


            <div class="d-flex p-0">
                <img src="{{ asset('/img/quiz/win.svg') }}" class="w-100 img-fluid">
            </div>
            <div class="card-body px-sm-4 pt-0">
                <div class="d-flex align-items-center mb-2">
                    <div class="col">
                        <p class="fw-normal">
                            {{ __('quiz.thanks') }}
                        </p>

                        <a href="{{route('home')}}" data-turbo-action="replace"
                           class="btn btn-primary m-auto d-flex align-items-center justify-content-center w-100">
                            Вернуться на главную
                        </a>
                    </div>
                </div>
            </div>
        </template>
    </turbo-stream>

@elseif($quiz->gameOver)
    <turbo-stream target="quiz" action="update">
        <template>
            <div class="d-flex p-0">
                <img src="{{ asset('/img/ui/items.svg') }}" class="w-100 img-fluid">
            </div>
            <div class="card-body px-sm-4 pt-0">
                <div class="d-flex align-items-center mb-2">
                    <h1 class="">
                        Игра окончена. Ты проиграл.
                    </h1>
                </div>
                <a href="{{route('stream.quiz.start')}}"
                   data-turbo-method="post"
                   class="btn btn-primary d-flex align-items-center">
                    <x-icon path="et.reset" class="ms-auto me-2"/>
                    <span class="me-auto">Попробывать снова</span>
                </a>
            </div>
        </template>
    </turbo-stream>
@else

    <turbo-stream target="quiz" action="update">
        <template>
            <div class="card-body px-sm-4 pt-sm-3">
                <div>
                    @if(!$quiz->displayInfo)
                        <div class="d-flex align-items-baseline">
                            <h5 class="mb-3 me-2">
                                {{ __($currentQuestion->getTitle()) }}
                            </h5>

                            <button type="button"
                                    class="ms-auto btn btn-close px-2"
                                    data-bs-target="#closeQuiz"
                                    data-bs-toggle="modal">
                            </button>
                        </div>
                        <div class="{{ $quiz->displayInfo ? 'visually-hidden' : ''}}">

                            @if($quiz->isIncorrect)
                                <p class="text-center text-muted">
                                    Неверно, попробуйте еще раз.
                                </p>
                            @endif

                            @foreach($currentQuestion->getAnswers() as $answer)
                                <a href="{{route('stream.quiz.set-answer',['answer'=> $answer ])}}"
                                   data-turbo-method="post"
                                   class="btn btn-secondary d-flex w-100 mb-3
                                    {{ $currentQuestion->isCorrect($quiz->userAnswer) && $answer === $quiz->userAnswer ? 'btn-success' : '' }}
                                   {{ in_array($answer, $quiz->currentAnswers, true) ? 'btn-danger' : '' }}"
                                    {{ in_array($answer, $quiz->currentAnswers, true) ? "disabled" : '' }}
                                >
                                    {{ __($answer) }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="{{ !$quiz->displayInfo ? 'visually-hidden' : ''}}">

                            <h5 class="text-center mb-3">Верно!</h5>

                            <div class="alert alert-success mb-3 py-2" role="alert">
                                <strong>{{ __($quiz->userAnswer) }}</strong>
                            </div>

                            <p class="text-muted">
                                Ты ответил правльно! Поздравляю! Вот что я могу тебе рассказать:
                                Ты ответил правльно! Поздравляю! Вот что я могу тебе рассказать:
                                Ты ответил правльно! Поздравляю! Вот что я могу тебе рассказать:
                            </p>
                        </div>
                    @endif
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-auto text-danger opacity-75">
                        @foreach([1,2,3] as $value)
                            <span class="position-relative">
                            <x-icon path="{{ $quiz->live >= $value ? 'et.heart-fill' : 'et.heart-empty' }}"/>

                            @if($quiz->isIncorrect && $quiz->live +1 == $value)
                                    <span class="quiz-broken-heart"
                                          data-controller="lottie"
                                          data-lottie-loop-value="false"
                                          data-lottie-path-value="/animation/broken-heart"></span>
                                @endif
                            </span>
                        @endforeach
                    </div>
                    <div class="col d-flex align-items-center ">
                        <div class="col px-2">
                            <div class="progress progress-bg-absolute">
                                <div class="progress-bar bg-index" role="progressbar"
                                     style="width:{{ $currentStepPercent }}%">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-flex align-items-center px-2">
                            <small class="text-muted"> {{ $quiz->stepProgressBar }}
                                /{{ $quiz->countQuestions }}</small>
                        </div>
                    </div>
                </div>
                @if($quiz->stepProgressBar == $quiz->countQuestions)
                    <div class="">
                        <a href="{{route('stream.quiz.next')}}"
                           {{ !empty($quiz->userAnswer) ? '' : 'disabled'  }}
                           data-turbo-method="post"
                           class="btn btn-primary w-100" aria-current="true">
                            {{__('quiz.complete.button')}}
                        </a>
                    </div>
                @elseif($quiz->displayInfo)
                    <div class="">
                        <a href="{{route('stream.quiz.next')}}"
                           data-turbo-method="post"
                           {{ !empty($quiz->userAnswer) ? '' : 'disabled'  }}
                           class="btn btn-primary w-100" aria-current="true">
                            Продолжить
                        </a>
                    </div>
                @endif
            </div>

        </template>
    </turbo-stream>
@endif


