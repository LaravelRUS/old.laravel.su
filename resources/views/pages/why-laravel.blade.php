@extends('layout')
@section('title', 'Laravel: PHP-фреймворк №1')

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

{{--
    <x-container>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <h3 class="fs-2 text-body-emphasis">150 млн+</h3>
                <p>Установок по всему миру</p>
            </div>
            <div class="feature col">
                <h3 class="fs-2 text-body-emphasis">19 030</h3>
                <p>Разработчиков Laravel говорящих на русском</p>
            </div>
            <div class="feature col">
                <h3 class="fs-2 text-body-emphasis"> 10</h3>
                <p>Годы доказанной ценности</p>
            </div>
        </div>
    </x-container>
--}}

    <x-container>
        <div class="row align-items-start g-5">

            <div class="col-md-6">
                <div class="row g-5 row-cols-md-2">
                    <div class="col">
                        <div class="d-flex flex-md-row flex-column px-4 py-3 py-xl-5 bg-body-secondary rounded position-relative align-items-md-center">
                            <div class="vr bg-primary position-absolute start-0 opacity-100" style="top: 1.5em; bottom: 1.5em;"></div>
                            <div>
                                <div class="d-flex align-items-center mb-3 mb-md-0">
                                    <p class="fs-4 mb-0"><span class="fs-3">5</span> тысяч</p>
                                </div>
                                <time class="small">Специалистов в России</time>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-md-row flex-column px-4 py-3 py-xl-5 bg-body-secondary rounded position-relative align-items-md-center">
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
                        <div class="d-flex flex-md-row flex-column px-4 py-3 py-xl-5 bg-body-secondary rounded position-relative align-items-md-center">
                            <div class="vr bg-primary position-absolute start-0 opacity-100" style="top: 1.5em; bottom: 1.5em;"></div>
                            <div>
                                <div class="d-flex align-items-center mb-3 mb-md-0">
                                    <p class="fs-4 mb-0"><span class="fs-3">19 030</span> тысяч</p>
                                </div>
                                <time class="small">Разработчиков Laravel говорящих на русском</time>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-md-row flex-column px-4 py-3 py-xl-5 bg-body-secondary rounded position-relative align-items-md-center">
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
            </div>

            <div class="col-12 col-md-6">
                <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                    <main class="text-balance">
                        <p>
                            В мире веб-разработки существует целое множество инструментов и технологий, которые помогают
                            создавать и воплощать идеи в интернете.
                            Однако, если вы хотите построить что-то по-настоящему великое, то необходимо обратить свой
                            взгляд на <abbr
                                title="Фреймворки - это инструменты, которые включают готовые компоненты кода и позволяют упростить и ускорить процесс программирования.">фреймворки</abbr>.
                        </p>

                        <p>Laravel - это известный фреймворк, который помогает разработчикам создавать веб-сайты и
                           веб-приложения на языке <abbr
                                title="PHP — это язык программирования, используемый для создания веб-сайтов и веб-приложений">PHP</abbr>.


                        <p class="mb-0">В отличие от CMS, которые предлагают ограниченный набор готовых решений, Laravel даёт
                           полный контроль над каждой линией кода.
                           Разработчики могут создавать уникальные функции, настраивать и
                           оптимизировать процессы под наши нужды и требования, создавая продукт, который отражает
                           индивидуальность и взгляд на мир.</p>


                        {{--
                        <p class="mb-0">С помощью Laravel можно создавать разные функциональности, такие как системы оплаты, страницы
                           входа или управление пользователями. Laravel существует уже с 2011 года и пользуется огромной
                           популярностью в сообществе разработчиков. Он выбирается более чем 50 000 разработчиков по
                           всему миру, что свидетельствует о его значимости и широком применении.
                        </p>
                        --}}
                    </main>
                </div>
            </div>

        </div>
    </x-container>


    <x-container>
        <div class="row align-items-center">


            <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
                <!-- Right side START -->
                <div class="col-lg-8 me-auto">
                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">
                        Быстро и уверенно
                    </span>
                    <!-- Title -->
                    <h2 class="display-5 fw-semibold mb-0">Увеличение производительности</h2>
                </div>
                <!-- Right side END -->
            </div>


            <div class="col-12 col-md-6">
                <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                    <main class="text-balance">

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
            </div>

            <div class="col-md-6">
                <img src="/img/ui/workers.svg" class="img-fluid">
            </div>

        </div>
    </x-container>


    <div class="bg-dark-subtle text-white py-5" style="background-image: url('/img/bg-packages.svg')" data-bs-theme="dark">
        <div class="container px-4 py-5 packages">

            <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
                <!-- Right side START -->
                <div class="col-lg-8">
                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Открытый исходный код</span>
                    <!-- Title -->
                    <h2 class="display-5 fw-semibold mb-0">Устойчивость</h2>
                </div>
                <!-- Right side END -->

                <!-- Left side START -->
                <div class="col-lg-3 ms-auto position-relative ">
                        <img src="/img/ui/hair-comb.svg" class="img-fluid"/>
                </div>
                <!-- Left side END -->
            </div>

            <div class="row g-4 g-md-5">
                <div class="col">
                    <p>
                        Laravel имеет одно из самых активных и дружелюбных сообществ веб-разработчиков. Если у вас
                        возникнут вопросы или проблемы, вы всегда сможете найти помощь и ответы на форумах или
                        специализированных ресурсах. Кроме того, Laravel предлагает подробную и обширную документацию,
                        что облегчает изучение и использование фреймворка.
                    </p>
                </div>
                    <div class="col">
                        <p>
                            Laravel предлагает встроенные инструменты для обеспечения безопасности вашего приложения,
                            включая основные меры защиты от атак, такие как обработка CSRF-токенов, проверка доступа и
                            хэширование паролей. Это позволяет вам сконцентрироваться на разработке функциональности
                            вашего приложения, не отвлекаясь на проблемы безопасности.
                        </p>
                    </div>
            </div>
        </div>
    </div>



    <x-container>
        <div class="row align-items-center">


            <div class="col-md-6">
                <img src="/img/ui/matreshka-v.svg" class="img-fluid">
            </div>

            <div class="col-12 col-md-6">

                <div class="mb-5">
                    <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">
                        Быстро и уверенно
                    </span>
                    <h2 class="display-5 fw-semibold mb-0">Увеличение производительности</h2>
                </div>

                <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                    <main class="post">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                            <p class="mb-0 w-75 text-balance">Это открытый исходный код</p>
                        </div>

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                            <p class="mb-0 w-75 text-balance">Это надежно и безопасно</p>
                        </div>

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                            <p class="mb-0 w-75 text-balance">Приложения Laravel легкие и быстрые.</p>
                        </div>

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                            <p class="mb-0 w-75 text-balance">Приложения просты в обслуживании и масштабируемости.</p>
                        </div>

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                            <p class="mb-0 w-75 text-balance">риложения легко связать с другими системами.</p>
                        </div>

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                            <p class="mb-0 w-75 text-balance">Возможность автоматического тестирования</p>
                        </div>

                        <div class="d-flex align-items-center gap-3 mb-0">
                            <x-icon path="i.circle-fill" class="text-primary" width="40px"/>
                            <p class="mb-0 w-75 text-balance">Сообщество, насчитывающее более 50 000 разработчиков, каждый день добавляет в фреймворк
                                            новые компоненты.</p>
                        </div>
                    </main>
                </div>
            </div>


        </div>
    </x-container>

    @include('particles.sponsors')

    <x-call-to-action link="https://github.com/laravel-russia" text="Внесите свой вклад на GitHub">
        <x-slot:title>Аргументы убедили тебя?</x-slot>

            <x-slot:description>
                С вашим участием и энергией, вы можете вдохнуть новую жизнь в сообщество и внести положительные перемены для всех его членов.
                </x-slot>
    </x-call-to-action>

@endsection
