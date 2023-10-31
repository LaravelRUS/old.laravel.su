@extends('layout')
@section('title', 'Реклама')

@section('content')

    <div class="container py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="/img/bird.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                     height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Остаёмся на связи</span>
                <h1 class="display-5 fw-bold mb-4">Реклама</h1>
                <p class="pe-5">
                    Партнерство с Laravel Russian — это прекрасная возможность представить свой бренд тысячам разработчиков программного обеспечения.
                </p>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="p-5 text-start bg-body-tertiary rounded-3">
            <div class="row align-items-center g-5">
                <div class="col">
                        <h3 class="text-body-emphasis mb-3 display-5">Титульное партнерство</h3>
                        <p class="text-muted">
                            Титульное партнерство помещает вашу компанию как на домашнюю страницу, так и на страницу партнеров. Вы
                            можете подписаться на этот пакет, войдя в систему или зарегистрировавшись и перейдя на страницу подписки.
                        </p>
                </div>

                <div class="col-xxl-5">
                    <div class="d-flex gap-2 mb-3 align-items-center">
                        <x-icon path="bs.tv" width="5rem" height="5rem" class="me-3"/>
                        <div class="col-10">
                            <p class="mb-0 lh-1">Ваш логотип и ссылка на главной странице.</p>
                            <small class="opacity-50">Самая посещаемая страница на сайте.</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <x-icon path="bs.people" width="5rem" height="5rem" class="me-3"/>
                        <div class="col-10">
                            <p class="mb-0 lh-1">Более 1,5 млн показов каждый месяц</p>
                            <small class="opacity-50">Самая посещаемая страница на сайте.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="p-5 text-start bg-body-tertiary rounded-3">
            <div class="row align-items-center g-5">
                <div class="col">
                    <h3 class="text-body-emphasis mb-3 display-5">Спонсорский контент</h3>
                    <p class="text-muted">
                        Спонсорский контент — лучший способ представить ваш продукт или услугу как можно большему
                        количеству разработчиков Laravel. Вы предоставите контент, а мы позаботимся обо всем остальном.
                    </p>
                </div>

                <div class="col-xxl-5">
                    <div class="d-flex gap-2 mb-3 align-items-center">
                        <x-icon path="bs.tv" width="5rem" height="5rem" class="me-3"/>
                        <div class="col-10">
                            <p class="mb-0 lh-1">Специальная спонсорская статья о вашей компании или услуге.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-3 align-items-center">
                        <x-icon path="bs.tv" width="5rem" height="5rem" class="me-3"/>
                        <div class="col-10">
                            <p class="mb-0 lh-1">Статья выделена на главной странице на всю неделю.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <x-icon path="bs.tv" width="5rem" height="5rem" class="me-3"/>
                        <div class="col-10">
                            <p class="mb-0 lh-1">Рассылается всем подписчикам RSS и социальных сетей.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="p-5 text-start bg-body-tertiary rounded-3">
            <div class="row align-items-center g-5">
                <div class="col">
                    <h3 class="text-body-emphasis mb-3 display-5">Подкаст</h3>
                    <p class="text-muted">
                        Подкаст — идеальный способ повысить узнаваемость бренда с помощью аудио. В среднем
                        4500 загрузок на эпизод — это прекрасная возможность привлечь внимание разработчиков Laravel.
                    </p>
                </div>

                <div class="col-xxl-5">
                    <div class="d-flex gap-2 mb-3 align-items-center">
                        <x-icon path="bs.tv" width="5rem" height="5rem" class="me-3"/>
                        <div class="col-10">
                            <p class="mb-0 lh-1">1–2-минутное чтение ведущего во время выпуска.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <x-icon path="bs.tv" width="5rem" height="5rem" class="me-3"/>
                        <div class="col-10">
                            <p class="mb-0 lh-1">Ссылка и краткое описание в примечаниях к эпизодам.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-5">
        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path
                            d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2 fw-semibold">Часто задаваемые вопросы</h5>
                <p class="mb-0">Не можете найти ответ, который ищете? Свяжитесь с нашей командой по адресу <a href="#">hello@laravel.su</a>.</p>
            </div>
            <div class="col-xl-8 text-center text-xl-start">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">

                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Каковы преимущества раздела партнеров Laravel Russia?</h6>
                        <p class="text-muted">
                            Laravel - это по-настоящему мощный фреймворк для разработки веб-приложений. Он
                            пользуется широкой популярностью благодаря своей простоте и элегантности кода. Множество
                            успешных веб-проектов, включая платформу Medium и онлайн-рынок Etsy, используют Laravel в
                            качестве основы. Он предлагает гибкую систему маршрутизации, ORM для работы с базой данных,
                            шаблонизатор Blade для удобного отображения данных и другие функциональные возможности.
                            Laravel имеет активное сообщество разработчиков и обновляется регулярно, что обеспечивает
                            его стабильность и развитие.
                        </p>
                    </div>

                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Как производятся платежи?</h6>
                        <p class="text-muted">
                            Laravel - это по-настоящему мощный фреймворк для разработки веб-приложений. Он
                            пользуется широкой популярностью благодаря своей простоте и элегантности кода. Множество
                            успешных веб-проектов, включая платформу Medium и онлайн-рынок Etsy, используют Laravel в
                            качестве основы. Он предлагает гибкую систему маршрутизации, ORM для работы с базой данных,
                            шаблонизатор Blade для удобного отображения данных и другие функциональные возможности.
                            Laravel имеет активное сообщество разработчиков и обновляется регулярно, что обеспечивает
                            его стабильность и развитие.
                        </p>
                    </div>


                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Как производятся платежи?</h6>
                        <p class="text-muted">
                            Laravel - это по-настоящему мощный фреймворк для разработки веб-приложений. Он
                            пользуется широкой популярностью благодаря своей простоте и элегантности кода. Множество
                            успешных веб-проектов, включая платформу Medium и онлайн-рынок Etsy, используют Laravel в
                            качестве основы. Он предлагает гибкую систему маршрутизации, ORM для работы с базой данных,
                            шаблонизатор Blade для удобного отображения данных и другие функциональные возможности.
                            Laravel имеет активное сообщество разработчиков и обновляется регулярно, что обеспечивает
                            его стабильность и развитие.
                        </p>
                    </div>


                    <div class="">
                        <h6 class="fw-bolder mb-3">Как производятся платежи?</h6>
                        <p class="text-muted">
                            Laravel - это по-настоящему мощный фреймворк для разработки веб-приложений. Он
                            пользуется широкой популярностью благодаря своей простоте и элегантности кода. Множество
                            успешных веб-проектов, включая платформу Medium и онлайн-рынок Etsy, используют Laravel в
                            качестве основы. Он предлагает гибкую систему маршрутизации, ORM для работы с базой данных,
                            шаблонизатор Blade для удобного отображения данных и другие функциональные возможности.
                            Laravel имеет активное сообщество разработчиков и обновляется регулярно, что обеспечивает
                            его стабильность и развитие.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="container py-5">
        <div class="row g-5 justify-content-center">

            <div class="col-md-6">
                <p class="h3 mb-4">Laravel и русскоязычное комьюнити - незаменимые ресурсы для нашего разработческого
                                   процесса. Благодарим за надежный фреймворк и поддержку!
                </p>


                <p class="mt-auto">
                    <img alt="image" height="50" class="rounded-circle"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&1">
                    <strong class="ms-3">Екатерина Смирнова <small class="opacity-50">- Генеральный менеджер Digital Solutions</small></strong>
                </p>
            </div>
            <div class="col-md-6">
                <p class="h3 mb-4">
                    Спасибо Laravel и русскоязычному комьюнити за чистый код и ценную поддержку!
                </p>
                <p class="mt-auto">
                    <img alt="image" height="50" class="rounded-circle"
                         src="https://xsgames.co/randomusers/avatar.php?g=male&7">
                    <strong class="ms-3">Александр Иванов <small class="opacity-50">- Генеральный директор Инновационные Технологии</small></strong>
                </p>
            </div>

        </div>
    </div>


@endsection
