@extends('layout')
@section('title', 'Почему Laravel?')
@section('description', 'Представь себе возможность создавать приложение с невероятной мощностью и легкостью - вот что ты получишь, выбрав Laravel.')

@section('content')

    <x-header image="/img/ui/whale.svg">
        <x-slot:sup>PHP-фреймворк №1</x-slot>
        <x-slot:title>Современный подход для PHP-проектов</x-slot>

            <x-slot:description>
                Представь себе возможность создавать приложение с невероятной мощностью и легкостью - вот что ты
                получишь, выбрав Laravel.
                </x-slot>

        <x-slot:actions>
            <a href="{{route('feature')}}" class="btn btn-primary btn-lg px-4">Для разработчика</a>

            <a href="{{ route('courses') }}"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">Обучение
                <x-icon path="i.arrow-right" class="bi" />
            </a>
        </x-slot>
    </x-header>

    <x-container>
        <div class="row g-5  row-cols-md-3">
            <div class="col">
                <div class="h-100 d-flex flex-md-row flex-column px-4 py-3 py-xl-5 bg-body-secondary rounded position-relative align-items-md-center">
                    <div class="vr bg-primary position-absolute start-0 opacity-100" style="top: 1.5em; bottom: 1.5em;"></div>
                    <div>
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <p class="fs-4 mb-0"><span class="fs-3">150+</span> млн</p>
                        </div>
                        <time class="small">Установок по всему миру</time>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 d-flex flex-md-row flex-column px-4 py-3 py-xl-5 bg-body-secondary rounded position-relative align-items-md-center">
                    <div class="vr bg-primary position-absolute start-0 opacity-100" style="top: 1.5em; bottom: 1.5em;"></div>
                    <div>
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <p class="fs-4 mb-0"><span class="fs-3">19+</span> тысяч</p>
                        </div>
                        <time class="small">Специалистов в России и СНГ</time>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 d-flex flex-md-row flex-column px-4 py-3 py-xl-5 bg-body-secondary rounded position-relative align-items-md-center">
                    <div class="vr bg-primary position-absolute start-0 opacity-100" style="top: 1.5em; bottom: 1.5em;"></div>
                    <div>
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <p class="fs-4 mb-0"><span class="fs-3">10+</span> лет</p>
                        </div>
                        <time class="small">Доказанной ценности</time>
                    </div>
                </div>
            </div>
        </div>

    </x-container>


    <x-container>
        <div class="row align-items-center justify-content-center">


            <div class="row g-4 g-md-5 justify-content-center align-items-end mb-2">
                <!-- Right side START -->
                <div class="col-lg-8 me-auto">
                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">
                        Быстро и уверенно
                    </span>
                </div>
                <!-- Right side END -->
            </div>


            <div class="col-12 col-lg-6">
                <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                    <main class="text-balance">
                        <p>
                            В мире веб-разработки существует целое множество инструментов и технологий, которые помогают
                            создавать и воплощать идеи в интернете.
                            Однако, если вы хотите построить что-то по-настоящему великое, то необходимо обратиться к
                            <abbr
                                title="Фреймворки - это инструменты, которые включают готовые компоненты кода и позволяют упростить и ускорить процесс программирования.">фреймворкам</abbr>.
                        </p>

                        <p>Laravel - это известный фреймворк, который помогает разработчикам создавать веб-сайты и
                           веб-приложения на языке <abbr
                                title="PHP — это язык программирования, используемый для создания веб-сайтов и веб-приложений">PHP</abbr>.


                        <p>В отличие от CMS, которые предлагают ограниченный набор готовых решений, Laravel даёт
                                        полный контроль над каждой линией кода.
                                        Разработчики могут создавать уникальные функции, настраивать и
                                        оптимизировать процессы под наши нужды и требования, создавая продукт, который отражает
                                        индивидуальность и взгляд на мир.</p>
                    </main>
                </div>
            </div>

            <div class="col-12 col-sm-8 col-md-6">
                <img src="/img/ui/workers.svg" class="img-fluid">
            </div>

        </div>
    </x-container>


    <div class="bg-dark-subtle text-white py-5" style="background-image: url('/img/bg-packages.svg')" data-bs-theme="dark">
        <div class="container px-4 py-5 packages">

            <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
                <!-- Right side START -->
                <div class="col-lg-8">
                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Улучшение командной работы</span>
                    <!-- Title -->
                    <h2 class="display-5 fw-semibold mb-0">Увеличение производительности</h2>
                </div>
                <!-- Right side END -->

                <!-- Left side START -->
                <div class="col-lg-3 ms-auto position-relative ">
                        <img src="/img/ui/hair-comb.svg" class="img-fluid d-none d-lg-block"/>
                </div>
                <!-- Left side END -->
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-4 g-md-5">
                <div class="col">
                    <main>
                        <p>Простой и интуитивно понятный синтаксис упрощает процесс разработки.
                           Благодаря этому разработчики смогут работать более эффективно и быстро
                           достигать требуемых результатов.
                        </p>

                        <p>
                            Активное сообщество разработчиков, которое поддерживает фреймворк и создает
                            дополнительные инструменты и расширения. А значит у вас будет доступ к огромному
                            количеству готовых решений, которые помогут нам сократить время и ресурсы при разработке
                            проектов.
                        </p>
                    </main>
                </div>
                    <div class="col">
                        <main>
                            <p>Проекты с несколькими разработчиками могут пойти не так, как надо, если нет ясности в следующих
                               вопросах:</p>

                            <div class="d-flex align-items-center gap-2 mb-2">
                                <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                                <p class="mb-0 w-75 text-balance">Документация</p>
                            </div>

                            <div class="d-flex align-items-center gap-2 mb-2">
                                <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                                <p class="mb-0 w-75 text-balance">Дизайнерские решения</p>
                            </div>

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                                <p class="mb-0 w-75 text-balance">Стандарты кода</p>
                            </div>

                            <p>Использование Laravel устанавливает четкие основные правила для вашего проекта. Даже если
                               другой разработчик не знаком с инфраструктурой, он сможет быстро освоить основы и работать
                               совместно.</p>
                        </main>
                    </div>
            </div>
        </div>
    </div>



    <x-container>
        <div class="row align-items-center">


            <div class="col-lg-6">
                <img src="/img/ui/matreshka-v.svg" class="img-fluid d-none d-lg-block">
            </div>

            <div class="col-12 col-lg-6">


                <div class="mb-5">
                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">
                        Стандарты качества
                    </span>
                    <h2 class="display-5 fw-semibold mb-0">Следуйте лучшим практикам</h2>
                </div>

                <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                    <main class="post">
                        <p>Laravel следуют лучшим практикам разработки, например, аккуратно делит код на несколько
                           каталогов в зависимости от функции.
                           Это заставляет разработчиков организовывать код более чистым, аккуратным и удобным для
                           сопровождения способом.
                        </p>

                        <p>
                            Существует множество угроз безопасности, включая межсайтовый скриптинг, атаки
                            SQL-инъекцией и подделку межсайтовых запросов. Если вы не предпримете правильные шаги для
                            защиты своего кода, ваши веб-приложения будут уязвимы.
                        </p>

                        <p>
                            Использование Laravel не заменяет написание безопасного кода, но сводит к минимуму
                            вероятность хакерских атак. Так как имеет встроенную защиту от распространенных угроз,
                            упомянутых выше.
                        </p>

                    </main>
                </div>
            </div>


        </div>
    </x-container>



    <x-header image="/img/bird.svg">
        <x-slot:sup>По всему миру</x-slot>
        <x-slot:title>Его любят тысячи разработчиков.</x-slot>

        <x-slot:description>
            Их предпочтения это неслучайность – фреймворк отличается надежностью, гибкостью и простотой использования
        </x-slot>
    </x-header>
    <x-container>

        <div class="row marketing">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column align-items-md-baseline">
                    <div class="position-relative mb-5">

                        <div class="text-balance bg-body-secondary rounded p-4 p-xl-5 position-relative">
                            <blockquote>Laravel - элегантность PHP</blockquote>

                            <div class="d-flex align-items-center">
                                <img alt="image" height="50" class="rounded-circle" src="/img/community/afanasyev.jpg">
                                <div class="ms-3 lh-1">
                                    <div class="fw-bolder mb-1">Дмитрий Афанасьев</div>
                                    <small class="opacity-50">@dmitriy-afanasyev</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="position-relative mb-5">

                        <div class="text-balance bg-body-secondary rounded p-4 p-xl-5 position-relative">
                            <blockquote>
                                Laravel — это истинное удовольствие. Позволяет создавать любые вещи, которые захочу.
                            </blockquote>

                            <div class="d-flex align-items-center">
                                <img alt="image" height="50" class="rounded-circle" src="/img/community/chernayev.jpeg">
                                <div class="ms-3 lh-1">
                                    <div class="fw-bolder mb-1">Александр Черняев</div>
                                    <small class="opacity-50">@tabuna</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="position-relative mb-5">

                    <div class="text-balance bg-body-secondary rounded p-4 p-xl-5 position-relative">
                        <blockquote>
                            Laravel - мой верный спутник уже много лет. Этот фреймворк идеально подходит для широкого
                            спектра задач. Моя практика включает множество успешных проектов на Laravel, благодаря его
                            стабильной работе, поддержке и разнообразию дополнительных инструментов.
                        </blockquote>

                        <div class="d-flex align-items-center">
                            <img alt="image" height="50" class="rounded-circle" src="/img/community/chubarov.jpg">
                            <div class="ms-3 lh-1">
                                <div class="fw-bolder mb-1">Илья Чубаров</div>
                                <small class="opacity-50">@agoalofalife</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="position-relative mb-5">

                    <div class="text-balance bg-body-secondary rounded p-4 p-xl-5 position-relative">
                        <blockquote>
                            Laravel даёт свободу творить, упрощая сложное и вдохновляя на новое!
                        </blockquote>

                        <div class="d-flex align-items-center">
                            <img alt="image" height="50" class="rounded-circle" src="/img/community/andrey-helldar.jpeg">
                            <div class="ms-3 lh-1">
                                <div class="fw-bolder mb-1">Андрей Хэллдар</div>
                                <small class="opacity-50">@andrey-helldar</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-container>


{{--
    <x-call-to-action link="https://github.com/laravel-russia" text="Внесите свой вклад на GitHub">
        <x-slot:title>Аргументы убедили тебя?</x-slot>

        <x-slot:description>
            С вашим участием и энергией, вы можете вдохнуть новую жизнь в сообщество и внести положительные перемены для всех его членов.
        </x-slot>
    </x-call-to-action>
--}}

@endsection
