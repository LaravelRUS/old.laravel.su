@extends('layout')
@section('title', 'Реклама')

@section('content')

    <x-header image="/img/ui/jewelry.svg">
        <x-slot:sup>Повысьте авторитет вашего бизнеса</x-slot>
        <x-slot:title>Партнерство</x-slot>

        <x-slot:description>
            Прекрасная возможность представить свой бренд тысячам разработчикам, студентам и узких специалистов.
        </x-slot>
    </x-header>

    <x-container>
        <div class="p-4 p-xl-5 text-start bg-body-tertiary rounded-3">
            <div class="row align-items-start g-4 g-md-5 justify-content-between">
                <div class="col">
                    <h3 class="display-5 fw-semibold mb-4 text-balance">Титульное партнерство</h3>
                    <p class="mb-0">
                        Титульное партнерство помещает вашу компанию как на домашнюю страницу, так и на страницу спонсоров.
                    </p>
                </div>

                <div class="col-xxl-5">
                    <div class="d-flex gap-2 mb-3 align-items-center">
                        <x-icon path="i.sun" width="5rem" height="5rem" class="me-3" />
                        <div class="col-10">
                            <p class="mb-0 fw-bolder text-balance">Ваш логотип и ссылка на главной странице.</p>
                            <small class="opacity-50 text-balance">Самая посещаемая страница на сайте.</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center justify-content-between">
                        <x-icon path="i.eye" width="5rem" height="5rem" class="me-3" />
                        <div class="col-10">
                            <p class="mb-0 fw-bolder text-balance">Более 54 тысяч показов каждый месяц</p>
                            <small class="opacity-50 text-balance">Самая посещаемая страница на сайте.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>

    <x-container>
        <div class="p-4 p-xl-5 text-start bg-body-tertiary rounded-3">
            <div class="row align-items-start g-4 g-md-5 justify-content-between">
                <div class="col">
                    <h3 class="display-5 fw-semibold mb-4 text-balance">Спонсорский контент</h3>
                    <p class="mb-0">
                        Спонсорский контент — лучший способ представить ваш продукт или услугу как можно большему
                        количеству разработчиков Laravel. Вы предоставите контент, а мы позаботимся обо всем остальном.
                    </p>
                </div>

                <div class="col-xxl-5">
                    <div class="d-flex gap-2 mb-3 align-items-center justify-content-between">
                        <x-icon path="i.paper" width="5rem" height="5rem" class="me-3" />
                        <div class="col-10">
                            <p class="mb-0 fw-bolder text-balance">Специальная спонсорская статья о вашей компании или услуге.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-3 align-items-center justify-content-between">
                        <x-icon path="i.pin" width="5rem" height="5rem" class="me-3" />
                        <div class="col-10">
                            <p class="mb-0 fw-bolder text-balance">Статья выделена на главной странице на всю неделю.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center justify-content-between">
                        <x-icon path="i.envelope" width="5rem" height="5rem" class="me-3" />
                        <div class="col-10">
                            <p class="mb-0 fw-bolder text-balance">Рассылается всем подписчикам RSS и социальных сетей.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>

    <x-container>
        <div class="p-4 p-xl-5 text-start bg-body-tertiary rounded-3">
            <div class="row align-items-start g-4 g-md-5 justify-content-between">
                <div class="col">
                    <h3 class="display-5 fw-semibold mb-4 text-balance">Подкаст</h3>
                    <p class="mb-0">
                        Подкаст — идеальный способ повысить узнаваемость бренда с помощью аудио. В среднем
                        1000 загрузок на эпизод — это прекрасная возможность привлечь внимание разработчиков Laravel.
                    </p>
                </div>

                <div class="col-xxl-5">
                    <div class="d-flex gap-2 mb-3 align-items-center justify-content-between">
                        <x-icon path="i.camera" width="5rem" height="5rem" class="me-3" />
                        <div class="col-10">
                            <p class="mb-0 fw-bolder text-balance">1–2-минутное чтение ведущего во время выпуска.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center justify-content-between">
                        <x-icon path="i.link-fold" width="5rem" height="5rem" class="me-3" />
                        <div class="col-10">
                            <p class="mb-0 fw-bolder text-balance">Ссылка и краткое описание в примечаниях к эпизодам.</p>
                        </div>
                    </div>
                </div>
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
                <p class="mb-0">Не можете найти ответ, который ищете? Свяжитесь с нашей командой по адресу
                    <a href="https://t.me/tabuna">t.me/tabuna</a>.
                </p>
            </div>
{{--
            <div class="col-xl-8 text-center text-xl-start">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">

                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Что такое Laravel-сообщество?</h6>
                        <p class="text-muted">
                            Это площадка для менеджеров, студентов, разработчиков и энтузиастов занимающихся разработкой на Laravel, PHP и
                            связанных технологий. В русскоязычном Laravel-сообществе вы найдете опытных
                            программистов, статьи, уроки, новости, обсуждения и много полезной информации.
                        </p>
                    </div>

                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Какова аудитория русскоязычного Laravel-сообщества?</h6>
                        <p class="text-muted">
                            Аудитория русскоязычного Laravel-сообщества включает в себя начинающих и опытных
                            разработчиков, студентов и преподавателей, а также компании и предпринимателей,
                            интересующихся разработкой на Laravel. Здесь есть как новички, так и профессионалы, которые
                            продвигают Laravel в своих проектах.
                        </p>
                    </div>

                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Какую пользу я получу от размещения рекламы в русскоязычном Laravel-сообществе?</h6>
                        <p class="text-muted">
                            Размещение рекламы в русскоязычном Laravel-сообществе предоставит вам возможность достичь
                            целевой аудитории, заинтересованной в Laravel и связанных с ним технологиях. Вы сможете
                            привлечь внимание к вашему продукту, услуге или сообществу, а также установить контакт с
                            разработчиками и потенциальными клиентами.
                        </p>
                    </div>

                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Какие возможности для размещения рекламы предлагает русскоязычное Laravel-сообщество?</h6>
                        <p class="text-muted">
                            Русскоязычное Laravel-сообщество предлагает различные способы размещения рекламы.
                            Возможности включают размещение информационных материалов, баннеров, спонсорских публикаций,
                            участие в мероприятиях и подкастах, размещение рекламы на веб-сайте сообщества и многое
                            другое. Вы можете выбрать подходящий формат, который наилучшим образом соответствует вашим
                            целям и бюджету.
                            Мы так же открыты для индивидуальных проектов и готовы обсудить ваши потребности и предложить наилучшие варианты размещения рекламы.
                        </p>
                    </div>

                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Какие другие возможности для продвижения моего продукта или услуги в Laravel-сообществе существуют?</h6>
                        <p class="text-muted">
                            В дополнение к размещению рекламы, вы можете рассмотреть другие способы продвижения, такие
                            как участие в конкурсах и подкастах, написание статей или учебных материалов, организация
                            вебинаров или проведение тренингов. Сообщество всегда радо новым идеям и передовым проектам.
                        </p>
                    </div>


                    <div class="mb-5">
                        <h6 class="fw-bolder mb-3">Я новичок в Laravel-сообществе. Стоит ли мне рекламировать свой продукт или услугу?</h6>
                        <p class="text-muted">
                            Да, рекламирование вашего продукта или услуги может быть полезным, даже если вы новичок в
                            Laravel-сообществе. Ваша реклама может привлечь внимание и помочь вам установить связь с
                            сообществом. Будьте готовы ответить на вопросы и предложить что-то ценное для сообщества,
                            чтобы получить максимальную выгоду от размещения рекламы.
                        </p>
                    </div>

                    <div class="">
                        <h6 class="fw-bolder mb-3">Каковы преимущества рекламы в русскоязычном Laravel-сообществе по сравнению с другими каналами маркетинга?</h6>
                        <p class="text-muted">
                            Реклама в русскоязычном Laravel-сообществе предлагает целевую аудиторию, специализированную
                            в разработке на Laravel. Это позволяет вам точно достичь тех, кто заинтересован в вашем
                            продукте или услуге. Кроме того, реклама в Laravel-сообществе может быть более органичной и
                            иметь большую эффективность в сравнении с общедоступными каналами маркетинга.
                        </p>
                    </div>

                </div>
            </div>
            --}}
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 g-md-5">

                <div class="col">
                    <h6 class="fw-bolder mb-3">Что такое Laravel-сообщество?</h6>
                    <p class="text-muted">
                        Это площадка для менеджеров, студентов, разработчиков и энтузиастов занимающихся разработкой на Laravel, PHP и
                        связанных технологий. В русскоязычном Laravel-сообществе вы найдете опытных
                        программистов, статьи, уроки, новости, обсуждения и много полезной информации.
                    </p>
                </div>

                <div class="col">
                    <h6 class="fw-bolder mb-3">Какова аудитория русскоязычного Laravel-сообщества?</h6>
                    <p class="text-muted">
                        Аудитория русскоязычного Laravel-сообщества включает в себя начинающих и опытных
                        разработчиков, студентов и преподавателей, а также компании и предпринимателей,
                        интересующихся разработкой на Laravel. Здесь есть как новички, так и профессионалы, которые
                        продвигают Laravel в своих проектах.
                    </p>
                </div>

                <div class="col">
                    <h6 class="fw-bolder mb-3">Какую пользу я получу от размещения рекламы в русскоязычном Laravel-сообществе?</h6>
                    <p class="text-muted">
                        Размещение рекламы в русскоязычном Laravel-сообществе предоставит вам возможность достичь
                        целевой аудитории, заинтересованной в Laravel и связанных с ним технологиях. Вы сможете
                        привлечь внимание к вашему продукту, услуге или сообществу, а также установить контакт с
                        разработчиками и потенциальными клиентами.
                    </p>
                </div>

                <div class="col">
                    <h6 class="fw-bolder mb-3">Какие возможности для размещения рекламы предлагает русскоязычное Laravel-сообщество?</h6>
                    <p class="text-muted">
                        Русскоязычное Laravel-сообщество предлагает различные способы размещения рекламы.
                        Возможности включают размещение информационных материалов, баннеров, спонсорских публикаций,
                        участие в мероприятиях и подкастах, размещение рекламы на веб-сайте сообщества и многое
                        другое. Вы можете выбрать подходящий формат, который наилучшим образом соответствует вашим
                        целям и бюджету.
                        Мы так же открыты для индивидуальных проектов и готовы обсудить ваши потребности и предложить наилучшие варианты размещения рекламы.
                    </p>
                </div>

                <div class="col">
                    <h6 class="fw-bolder mb-3">Какие другие возможности для продвижения моего продукта или услуги в Laravel-сообществе существуют?</h6>
                    <p class="text-muted">
                        В дополнение к размещению рекламы, вы можете рассмотреть другие способы продвижения, такие
                        как участие в конкурсах и подкастах, написание статей или учебных материалов, организация
                        вебинаров или проведение тренингов. Сообщество всегда радо новым идеям и передовым проектам.
                    </p>
                </div>


                <div class="col">
                    <h6 class="fw-bolder mb-3">Я новичок в Laravel-сообществе. Стоит ли мне рекламировать свой продукт или услугу?</h6>
                    <p class="text-muted">
                        Да, рекламирование вашего продукта или услуги может быть полезным, даже если вы новичок в
                        Laravel-сообществе. Ваша реклама может привлечь внимание и помочь вам установить связь с
                        сообществом. Будьте готовы ответить на вопросы и предложить что-то ценное для сообщества,
                        чтобы получить максимальную выгоду от размещения рекламы.
                    </p>
                </div>

                <div class="col">
                    <h6 class="fw-bolder mb-3">Каковы преимущества рекламы в русскоязычном Laravel-сообществе по сравнению с другими каналами маркетинга?</h6>
                    <p class="text-muted">
                        Реклама в русскоязычном Laravel-сообществе предлагает целевую аудиторию, специализированную
                        в разработке на Laravel. Это позволяет вам точно достичь тех, кто заинтересован в вашем
                        продукте или услуге. Кроме того, реклама в Laravel-сообществе может быть более органичной и
                        иметь большую эффективность в сравнении с общедоступными каналами маркетинга.
                    </p>
                </div>

            </div>

    </x-container>
@endsection
