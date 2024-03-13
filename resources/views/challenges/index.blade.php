@extends('layout')
@section('title', 'Кодица')

@section('content')

    <x-header image="/img/ui/challenges.svg">
        <x-slot:sup>Ежемесячная задача</x-slot>
        <x-slot:title>Кодица</x-slot>

        <x-slot:description>
           Выполняйте задания по программирования вместе с другими разработчиками, присоединившись к Кодицы 👇
        </x-slot>

        <x-slot:actions>
            @can('create', \App\Models\ChallengeApplication::class)
                <a href="{{ route('challenges.registration') }}" class="btn btn-primary btn-lg px-4">Присоединится</a>
            @elseif(!is_null($readyApplicationUrl))
                <a href="{{ $readyApplicationUrl}}" target="_blank" rel="noreferrer" class="btn btn-primary btn-lg px-4" title="Вы уже участвуете">Вы уже участвуете</a>
            @else
                <a href="#" class="btn btn-primary btn-lg px-4 disabled">В ожидании анонса</a>
            @endcan
            <a href="{{ route('challenges.past') }}" class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">
                Прошлые задачи
                <x-icon path="i.arrow-right" class="bi"/>
            </a>
        </x-slot>
    </x-header>


    <x-container>
        <div class="row g-5 align-items-center text-balance">
            <!-- Features -->
            <div class="col-lg-8">
                <div class="row g-xl-5 g-5">
                    <!-- Item -->
                    <div class="col-md-6">
                        <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative mt-5">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{asset('img/ui/challenges/kodica1.svg')}}" width="50px">
                                <p class="fs-5 fw-bold mb-0 lead lh-1">Опыт не важен</p>
                            </div>

                            <p class="mb-0">Добавьте в свое портфолио и покажите
                                            работодателям в качестве примеров работ.
                            </p>
                        </div>

                        <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative mt-5">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{asset('img/ui/challenges/kodica3.svg')}}" width="50px">
                                <p class="fs-5 fw-bold mb-0 lead lh-1">Подключитесь к коллективу</p>
                            </div>

                            <p class="mb-0">
                                Сравните свое решение с другими для лучшего понимания.
                                Обсуждайте лучшие практики и методы с сообществом. Вы будете поражены тем,
                                насколько другие решения могут отличаться от ваших собственных.
                            </p>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-md-6">
                        <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{asset('img/ui/challenges/kodica2.svg')}}" width="50px">
                                <p class="fs-5 fw-bold mb-0 lead lh-1">Станьте лучше</p>
                            </div>


                            <p class="mb-0">Присоединиться к сообществу и завести новые знакомства</p>
                        </div>

                        <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative mt-5">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{asset('img/ui/challenges/kodica4.svg')}}" width="50px">
                                <p class="fs-5 fw-bold mb-0 lead lh-1">Соревнуйтесь с коллегами</p>
                            </div>

                            <p class="mb-0">
                                Соревнуйтесь со своими друзьями, коллегами и сообществом в целом. Позвольте конкуренции
                                мотивировать вас к совершенствованию своего ремесла.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-4">
                <h2 class="mb-4 fw-bold">Что такое Кодица?</h2>
                <p><span class="text-primary">Кодица</span> - это событие, которое объединяет талантливых разработчиков,
                                                            программистов и
                                                            креативных мыслителей. Это место, где идеи становятся
                                                            реальностью, а коды превращаются в
                                                            функциональные приложения. Но помимо этого это еще и
                                                            невероятно весело!
                </p>

                <p class="opacity-75 small">Независимо от уровня ваших навыков, вы можете принять участие в этих
                                      соревнованиях, чтобы
                                      ускорить обучение, навыки программирования и уверенность
                                      в себе.
                </p>
            </div>
        </div> <!-- Row END -->
    </x-container>

    <x-container>
        <div class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Как это работает</div>
        <div class="bg-body-secondary p-5 rounded-5 overflow-hidden">
            <div class="row gx-5 gy-4 gy-md-5 row-cols-1 row-cols-lg-3 text-balance">
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">1</p>
                    <h3 class="fs-2 fw-bolder">Регистрация</h3>
                    <hr class="w-25 text-primary">
                    <p>Добавьте репозиторий, который вы
                       будете использовать в одиночку или совместно.</p>
                </div>
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">2</p>
                    <h3 class="fs-2 fw-bolder">Задача</h3>
                    <hr class="w-25 text-primary">
                    <p>Дождитесь появления задачи. Она будет доступна на странице в указанный день.</p>
                </div>
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">3</p>
                    <h3 class="fs-2 fw-bolder">Решение</h3>
                    <hr class="w-25 text-primary">
                    <p>Начните веселиться. Примените свои навыки для создания вашего уникального решения.</p>
                </div>
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">4</p>
                    <h3 class="fs-2 fw-bolder">Рецензия</h3>
                    <hr class="w-25 text-primary">
                    <p>Получите обратную связь от других участников или посмотрите их решения. Используйте ее для
                       улучшения своих навыков и решения задач в будущем.</p>
                </div>
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">5</p>
                    <h3 class="fs-2 fw-bolder">Признание!</h3>
                    <hr class="w-25 text-primary">
                    <p>Получите признание за вашу работу и достижения в Кодицы. Лучшие решения могут быть награждены
                       призами или поощрениями.</p>
                </div>

                <div class="col">
                    <div
                        class="p-4 p-xl-5 bg-body rounded d-flex flex-column h-100 position-relative d-flex align-items-center">


                        @can('create', \App\Models\ChallengeApplication::class)
                            <a class="icon-link icon-link-hover stretched-link link-body-emphasis text-decoration-none d-block text-center my-auto"
                               href="{{ route('challenges.registration') }}">
                                <span class="d-block mb-3">
                                    <x-icon path="i.sun" width="3rem" height="3rem"></x-icon>
                                </span>
                                Присоединится
                            </a>

                        @elseif(!is_null($readyApplicationUrl))
                            <a class="icon-link icon-link-hover stretched-link link-body-emphasis text-decoration-none d-block text-center my-auto"
                               href="{{ route('challenges.registration') }}"
                               target="_blank" rel="noreferrer" title="Вы уже участвуете">
                                <span class="d-block mb-3">
                                    <x-icon path="bs.github" width="3rem" height="3rem"></x-icon>
                                </span>
                                Вы участвуете
                            </a>
                        @else
                            <span class="text-decoration-none d-block text-center my-auto disabled opacity-75">
                                <span class="d-block mb-3">
                                    <x-icon path="i.sun" width="3rem" height="3rem"></x-icon>
                                </span>
                                В ожидании анонса
                            </span>
                        @endcan
                    </div>
                </div>

            </div>
        </div>
    </x-container>

    @if(!is_null($challenge))
        <x-container>
            <div class="bg-dark-subtle text-white p-5 rounded position-relative"
                 style="background-image: url('/img/bg-packages.svg')"
                 data-bs-theme="dark">


                {{-- челлендж не начался, быводим блок с днями до него--}}
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <h4 class="fw-bold">Тема Кодицы</h4>
                        {{ $challenge->presenter()->title() }}
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <h4 class="fw-bold">Задание</h4>
                        {!! $challenge->presenter()->description() !!}
                    </div>
                    <div class="col-12 col-lg-4">
                        <h4 class="fw-bold">Сроки </h4>
                        <p class="mb-1">Начало: {{$challenge->presenter()->startDate()}}</p>
                        <p>Окончание: {{$challenge->presenter()->stopDate()}}</p>

                    </div>
                </div>

                @if($challenge->hasNotStarted())
                    <div
                        class="challenge-blur rounded p-5 d-flex flex-column align-items-center justify-content-center">
                        <p class="fs-4 fw-bolder mb-2 opacity-75">Задача будет доступна</p>
                        <div class="d-flex align-items-end">
                            <span class="display-2 fw-bolder lh-1 me-2">{!! $challenge->presenter()->htmlBeforeStart() !!}</span>
                        </div>
                    </div>
                @endif
            </div>
        </x-container>
    @endif

    {{--
    <x-call-to-action link="#" text="Участвовать!">
        <x-slot:title>Достигайте мастерства через вызов</x-slot>

            <x-slot:description>
                Выполняйте задания по кодированию вместе с тысячами других разработчиков, присоединившись к Кодице прямо
                сейчас.
                </x-slot>

    </x-call-to-action>
--}}

    @if($challenge?->applications->isNotEmpty())
        <x-container>
            <div class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Участники</div>
            <div class="row row-cols-1 row-cols-md-2 g-4 g-md-5">
                <div class="col">
                    <ul class="bg-body-tertiary rounded ps-0 overflow-hidden">
                        @foreach($challenge->applications->split(2)->get(0) as $repo)
                            <li class="py-4 px-4 px-xl-5 {{ $loop->odd ? 'bg-body-secondary' : '' }} d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="fw-bold">{{$repo->github_repository}}</h5>
                                    <div class="d-flex align-items-center">
                                        <x-icon path="i.team" class="my-1" width="1rem" height="1rem"/>
                                        <span class="ms-2">{{$repo->count_participants}}</span>
                                    </div>
                                </div>
                                {{-- не удалять! блок для медальки.
                                <div><img src="{{asset('img/ui/medals/gold.svg')}}" height="40"/></div>
                                --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @if($challenge->applications->split(2)->get(1) !== null)
                    <div class="col">
                        <ul class="bg-body-tertiary rounded ps-0 overflow-hidden">
                            @foreach($challenge->applications->split(2)->get(1) as $repo)
                                <li class="py-4 px-4 px-xl-5 {{ $loop->odd ? 'bg-body-secondary' : '' }} d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="fw-bold">{{$repo->github_repository}}</h5>
                                        <div class="d-flex align-items-center">
                                            <x-icon path="i.team" class="my-1" width="1rem" height="1rem"/>
                                            <span class="ms-2">{{$repo->count_participants}}</span>
                                        </div>
                                    </div>
                                    {{-- не удалять! блок для медальки.
                                    <div><img src="{{asset('img/ui/medals/gold.svg')}}" height="40"/></div>
                                    --}}

                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </x-container>

    @endif
    <x-container>
        <div class="row g-4 g-md-5  align-items-start position-relative mb-5">
            <div class="col-xl-4 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        <x-icon path="i.faq"/>
                    </div>
                </div>
                <h5 class="fs-4 mt-2 fw-semibold">Часто задаваемые вопросы</h5>
                <p class="mb-0">Не можете найти ответ, который ищете?</p>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 g-md-5">

            <div class="col">
                <h6 class="fw-bolder mb-3">Кто может принять участие?</h6>
                <p class="text-muted">
                    Принять участие в хакатоне "Кодица" может любой желающий, как индивидуально, так и в команде от 2 до
                    5 человек.
                </p>
            </div>

            <div class="col">
                <h6 class="fw-bolder mb-3">Как мне найти команду?</h6>
                <p class="text-muted">
                    Аудитория русскоязычного Laravel-сообщества включает в себя начинающих и опытных
                    разработчиков. Вы можете найти знакомство в нашем чате или на сайте.
                </p>
            </div>

            <div class="col">
                <h6 class="fw-bolder mb-3">Как устроен процесс?</h6>
                <p class="text-muted">
                    В объявленный день, участники получат доступ к заданиям и будут иметь 24 часа на их выполнение.
                    В конце хакатона, команды представят свои проекты экспертному жюри, которое выберет победителей.
                </p>
            </div>

            <div class="col">
                <h6 class="fw-bolder mb-3">Куда выкладывать код?</h6>
                <p class="text-muted">
                    Исходный код необходимо выложить в репозиторий на GitHub.
                    Все участники будут иметь возможность посмотреть и оценить ваши работы.
                    Так же мы отслеживаем количество участников и состав команды по репозиториям.
                </p>
            </div>
        </div>

    </x-container>

@endsection
