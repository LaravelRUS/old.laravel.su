@extends('layout')
@section('title', 'Статус переводов')

@section('content')

    <div class="container py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="/img/bird.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                     height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Знания - навсегда</span>
                <h1 class="display-5 fw-bold mb-4">Учебные ресурсы</h1>
                <p class="pe-5">
                    Хотите расширить свои знания Laravel? Ниже приведен список книг, курсов и видеороликов,
                    созданных сообществом, которые помогут вам поднять свои знания на новый уровень.
                </p>
            </div>
        </div>
    </div>



    <div class="container py-5">
        <div class="row text-left align-items-center pt-5 pb-md-5">
            <div class="col-4 col-md-5">
                <img alt="image" class="img-fluid" src="/img/resources/tnspodcast.svg">
            </div>

            <div class="col-12 col-md-5 m-md-auto">
                <h2 class="display-6 fw-bold mb-4">Так не сойдёт</h2>
                <p class="lead">Подкаст где обсуждаются актуальные темы, вызывающие эмоции и
                                споры. Мы не боимся задавать вопросы, сомневаться и искать альтернативные точки зрения.
                                Наша цель - предоставить слушателям интересные и зажигательные эпизоды, которые заставят
                                задуматься и приведут к новым перспективам.
                </p>
                <p><a href="#">Перейти</a></p>
            </div>
        </div>

        <div class="row text-left align-items-center pt-5 pb-md-5">
            <div class="col-4 col-md-5 m-md-auto order-md-5">
                <img alt="image" class="img-fluid" src="https://sun9-63.userapi.com/impg/LiluhvMNpHA6O8zOBdnFcSw1mx1HtqzWKLKObw/mBFPPoG9dTE.jpg?size=1080x1080&quality=95&sign=40868a0e76923db02f9f94054d7ab7bc&type=album">
            </div>

            <div class="col-12 col-md-5">
                <h2 class="display-6 fw-bold mb-4">Архитектура сложных веб-приложений</h2>
                <p class="lead">
                    Книга переводится на русский язык автором исключительно с целью обратить ваше внимание на прекрасный
                    плагин для PhpStorm: Laravel Idea. Laravel Idea — расширение для платформы IDEA (PhpStorm),
                    экономящее время при разработке решений на основе Laravel. Прекрасное автозаполнение магии Laravel,
                    навигация по коду, генераторы кода, автокомплит валидаторов и роутов, и многое другое.
                </p>
                <p><a href="#">Перейти</a></p>
            </div>
        </div>

        <div class="row text-left align-items-center pt-5">
            <div class="col-4 col-md-5">
                <img alt="image" class="img-fluid" src="/img/resources/tnspodcast.svg">
            </div>

            <div class="col-12 col-md-5 m-md-auto">
                <h2 class="display-6 fw-bold mb-4">Так не сойдёт</h2>
                <p class="lead">Подкаст где обсуждаются актуальные темы, вызывающие эмоции и
                                споры. Мы не боимся задавать вопросы, сомневаться и искать альтернативные точки зрения.
                                Наша цель - предоставить слушателям интересные и зажигательные эпизоды, которые заставят
                                задуматься и приведут к новым перспективам.
                </p>
                <p><a href="#">Перейти</a></p>
            </div>
        </div>
    </div>

@endsection
