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
            <a href="#" class="btn btn-primary btn-lg px-4">Учавствовать</a>

            <a href="#"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">
                Прошлые задачи <x-icon path="i.arrow-right" class="bi" />
            </a>
        </x-slot>

    </x-header>



    <x-container>
            <div class="row g-5 align-items-center">
                <!-- Features -->
                <div class="col-lg-8">
                    <div class="row g-xl-5">
                        <!-- Item -->
                        <div class="col-md-6">
                            <div class="bg-body-tertiary p-4 rounded position-relative mt-5">
                                <!-- Icon -->
                                <figure class="text-primary mb-3 flex-shrink-0">
                                    <img src="{{asset('img/ui/challenges/kodica1.svg')}}" class="challenge-cover">
                                </figure>
                                <h5 class="fw-bold">Опыт не важен</h5>
                                <p class="mb-0">Чтобы вы могли включить их в свое портфолио и показать потенциальным
                                                работодателям в качестве примеров работ.
                                </p>
                            </div>

                            <div class="bg-body-tertiary p-4 rounded position-relative mt-5">
                                <!-- Icon -->
                                <figure class="text-primary mb-3 flex-shrink-0">
                                    <img src="{{asset('img/ui/challenges/kodica3.svg')}}" class="challenge-cover">
                                </figure>
                                <h5 class="fw-bold">Подключитесь к коллективному разуму</h5>
                                <p class="mb-0">
                                    Сравните свое решение с другими для лучшего понимания.
                                    Обсуждайте лучшие практики и методы с сообществом. Вы будете поражены тем,
                                    насколько другие решения могут отличаться от ваших собственных.
                                </p>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="col-md-6">
                            <div class="bg-body-tertiary p-4 rounded position-relative">
                                <!-- Icon -->
                                <figure class="text-primary mb-3 flex-shrink-0">
                                    <img src="{{asset('img/ui/challenges/kodica2.svg')}}" class="challenge-cover">
                                </figure>
                                <h5 class="fw-bold">Возможость стать лучше</h5>
                                <p class="mb-0">Присоединиться к сообществу и завести новые знакомства</p>
                            </div>

                            <div class="bg-body-tertiary p-4 rounded position-relative mt-5">
                                <!-- Icon -->
                                <figure class="text-primary mb-3 flex-shrink-0">
                                    <img src="{{asset('img/ui/challenges/kodica4.svg')}}" class="challenge-cover">
                                </figure>
                                <h5 class="fw-bold">Соревнуйтесь с коллегами</h5>
                                <p class="mb-0">
                                    Соревнуйтесь со своими друзьями, коллегами и сообществом в целом. Позвольте конкуренции мотивировать вас к совершенствованию своего ремесла.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-4">
                    <h2 class="mb-4 fw-bold">Что такое Кодица?</h2>
                    <p><span class="text-primary">Кодица</span> - это событие, которое объединяет талантливых разработчиков, программистов и
                       креативных мыслителей. Это место, где идеи становятся реальностью, а коды превращаются в
                       функциональные приложения. Но помимо этого это еще и невероятно весело!
                    </p>

                    <p class="opacity-75">Независимо от уровня ваших навыков, вы можете принять участие в этих соревнованиях, чтобы
                       ускорить обучение, навыки программирования и уверенность
                       в себе.
                    </p>
                </div>
            </div> <!-- Row END -->
    </x-container>

    <x-container>
        <div class="bg-dark-subtle text-white p-5 rounded position-relative" style="background-image: url('/img/bg-packages.svg')"
             data-bs-theme="dark">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <h4 class="fw-bold">Тема Кодицы</h4>
                    <p>Сравните свое решение с другими для лучшего понимания. Обсуждайте лучшие практики и методы
                        с сообществом. Сравните свое решение с другими для лучшего понимания. Обсуждайте лучшие
                        практики и методы с сообществом. Вы будете поражены тем, насколько другие решения могут
                        отличаться от ваших собственных.</p>
                </div>

                <div class="col-md-6 col-lg-4">
                    <h4 class="fw-bold">Задание</h4>
                    <p>Сравните свое решение с другими для лучшего понимания. Обсуждайте лучшие практики и
                        методы с сообществом. Вы будете поражены тем, насколько другие решения могут отличаться
                        от ваших собственных.Сравните свое решение с другими для лучшего понимания. Обсуждайте лучшие
                        практики и методы с сообществом. Вы будете поражены тем, насколько другие решения могут
                        отличаться от ваших собственных.</p>
                </div>
                <div class="col-12 col-lg-4">
                    <h4 class="fw-bold">Сроки </h4>
                    <ul>
                        <li>Сравните свое решение с другими для лучшего понимания.</li>
                        <li>Сравните свое решение с другими для лучшего понимания.</li>
                        <li>Сравните свое решение с другими для лучшего понимания.</li>
                    </ul>
                </div>
            </div>
            <div class="challenge-blur rounded p-5 d-flex flex-column align-items-center justify-content-center "
                 style="background-image: url('/img/bg-packages.svg')">
                <h3 class="fs-2 fw-bolder mb-5">До появления задачи</h3>
                <div class="d-flex align-items-end"><span class="display-1 text-primary fw-bolder lh-1 me-2">3 </span> <span class="fs-2 fw-bolder">дня</span></div>
            </div>

        </div>
    </x-container>

    <x-container>
        <div class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Как это работает</div>
        <div class="bg-body-secondary p-5 rounded-5 overflow-hidden">
            <div class="row gx-5 gy-4 gy-md-5 row-cols-1 row-cols-lg-3 align-items-baseline">
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">1</p>
                    <h3 class="fs-2 fw-bolder">Регистрация</h3>
                    <hr class="w-25 text-primary">
                    <p>Создайте бесплатную учетную запись на сайте. Добавьте ссылку на GitHub репозиторий, который вы
                       будете использовать вместе с вашей командой для разработки решения задачи.</p>
                </div>
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">2</p>
                    <h3 class="fs-2 fw-bolder">Публикация задачи</h3>
                    <hr class="w-25 text-primary">
                    <p>Дождитесь появления задачи. Она будет доступна на странице в указанный день.</p>
                </div>
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">3</p>
                    <h3 class="fs-2 fw-bolder">Разработка</h3>
                    <hr class="w-25 text-primary">
                    <p>Начните веселиться. Примените свои программистские навыки для создания вашего уникального решения.</p>
                </div>
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">4</p>
                    <h3 class="fs-2 fw-bolder">Оставайтесь на связи</h3>
                    <hr class="w-25 text-primary">
                    <p>Получите обратную связь от других участников или посмотрите их решения. Используйте ее для улучшения своих навыков и решения задач в будущем.</p>
                </div>
                <div class="col">
                    <p class="display-1 text-primary fw-bolder">5</p>
                    <h3 class="fs-2 fw-bolder">Стань лучше!</h3>
                    <hr class="w-25 text-primary">
                    <p>Получите признание за вашу работу и достижения в Кодицы. Лучшие решения могут быть награждены призами или поощрениями.</p>
                </div>
            </div>
        </div>
    </x-container>


{{--
    <x-container>

        <div class="bg-body-tertiary p-4 rounded position-relative">

            <div class="events-items" >
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <div class="event-author">
                            <div class="speak__date">
                                <i class="flaticon-clock-1" aria-hidden="true"></i>
                                <div class="date">10:00-12:00</div>
                                <div class="rs-hall-room"> Room#2</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex">
                            <div class="rs-topic-content">
                                <h3 class="event-title">
                                    Introduction Business                                                </h3>

                                <p >All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.                                                                                        </p></div>
                            <div class="ms-3">

                                <div class="avatar-sm">

                                    <img class="avatar" src="https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/09/1-2-100x100.jpg" alt="testing" data-original-title="Rihana kery">

                                </div>

                                <div class="avatar-sm">

                                    <img class="avatar" src="https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/09/2-100x100.jpg" alt="Hose Morinho" data-original-title="Hose Morinho">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="events-items">
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <div class="event-author">
                            <div class="speak__date">
                                <i class="flaticon-clock-1" aria-hidden="true"></i>
                                <div class="date">12:00-2:00</div>
                                <div class="rs-hall-room"> Room#2</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex">
                            <div class="rs-topic-content">
                                <h3 class="event-title">
                                    Digital Marketing Theory                                                </h3>

                                <p >All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.                                                                                        </p></div>
                            <div class="ms-3">

                                <div class="avatar-sm">
                                    <img class="avatar" src="https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/09/8-100x100.jpg" alt="Stiven Smith" data-original-title="Stiven Smith">
                                </div>

                                <div class="avatar-sm">

                                    <img class="avatar" title="" src="https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/09/6-100x100.jpg" alt="dddddddddddddddddd" data-original-title="Seroun Pawor">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="events-items" >
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <div class="event-author">
                            <div class="speak__date">
                                <i class="flaticon-clock-1" aria-hidden="true"></i>
                                <div class="date">2:00-3:00</div>
                                <div class="rs-hall-room"> Room#2</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex">
                            <div class="rs-topic-content">
                                <h3 class="event-title">
                                    Lunch Break                                                 </h3>

                                <p >All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.                                                                                        </p></div>
                            <div class="ms-3">

                                <div class="avatar-sm">
                                    <img decoding="async" src="https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/09/lunchpp.jpg" alt="break" data-original-title="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="events-items" >
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <div class="event-author">
                            <div class="speak__date">
                                <i class="flaticon-clock-1" aria-hidden="true"></i>
                                <div class="date">3:00-5:00</div>
                                <div class="rs-hall-room"> Room#2</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex">
                            <div class="rs-topic-content">
                                <h3 class="event-title">
                                    Marketing Workshop                                                </h3>

                                <p >All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.                                                                                        </p></div>
                            <div class="ms-3">

                                <div class="avatar-sm">

                                    <img class="avatar" src="https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/09/3-100x100.jpg" alt="Angelo Markel" data-original-title="Angelo Markel">

                                </div>

                                <div class="avatar-sm">

                                    <img class="avatar" src="https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/09/4-100x100.jpg" alt="Shara Rose" data-original-title="Shara Rose">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </x-container>
--}}

    <x-call-to-action link="#" text="Участвовать!">
        <x-slot:title>Достигайте мастерства через вызов</x-slot>

        <x-slot:description>
            Выполняйте задания по кодированию вместе с тысячами других разработчиков, присоединившись к Кодице прямо сейчас.
        </x-slot>

    </x-call-to-action>

    <x-container>
        <div class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Участники</div>
        <div class="row row-cols-1 row-cols-md-2 g-4 g-md-5">
            <div class="col">
                <ul class="bg-body-tertiary rounded ps-0 overflow-hidden">
                    <li class="p-3 bg-body-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>
                        <div><img src="{{asset('img/ui/medals/gold.svg')}}" height="40"/></div>

                    </li>
                    <li class="p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>
                        <div><img src="{{asset('img/ui/medals/silver.svg')}}" height="40"/></div>

                    </li>
                    <li class="p-3 bg-body-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>
                        <div><img src="{{asset('img/ui/medals/bronze.svg')}}" height="40"/></div>

                    </li>
                    <li class="p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>

                    </li>
                    <li class="p-3 bg-body-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="col">
                <ul class="bg-body-tertiary rounded ps-0 overflow-hidden">
                    <li class="p-3 bg-body-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>


                    </li>
                    <li class="p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>

                    </li>
                    <li class="p-3 bg-body-secondary d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>

                    </li>
                    <li class="p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold">nickname/team</h5>
                            <div class="d-flex align-items-center">
                                <x-icon path="i.team" class="my-1" width="1rem" height="1rem" />
                                <span class="ms-2">5</span>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </x-container>

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

{{--
    <x-container>
        <div class="row g-4 g-md-5  align-items-start position-relative mb-5">
            <div class="col-xl-4 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        <x-icon path="i.faq"/>
                    </div>
                </div>
                <h5 class="fs-4 mt-2 fw-semibold">Экспертный совет</h5>
                <p class="mb-0">Быть судьей тоже весело :)</p>
            </div>
        </div>


        <div class="row g-4 g-md-5 row-cols-5 row-cols-lg-5 text-center justify-content-start text-balance"  style="filter:grayscale(100%)">

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                     src="/img/community/butochnikov.jpg">

                <h6 class="mt-2 small"><strong>Алексей Буточников</strong>
                    <small class="opacity-75">Воплощает визуальную мечту в реальность</small>
                </h6>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                     src="/img/community/nesmiyanov.jpg">

                <h6 class="mt-2 small"><strong>Кирилл Несмеянов</strong>
                    <small class="opacity-75">Воплощает визуальную мечту в реальность</small>
                </h6>
            </div>

            <div class="col">
                <img alt="image" class="img-fluid rounded-circle mb-3"
                     src="/img/community/skirta.jpg">

                <h6 class="mt-2 small">
                    <strong>Дмитрий Скирта</strong>
                    <small class="opacity-75">Воплощает визуальную мечту в реальность</small>
                </h6>
            </div>

        </div>

    </x-container>
--}}
@endsection
