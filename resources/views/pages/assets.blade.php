@extends('layout')
@section('title', 'Ресурсы')

@section('content')

    <x-header image="/img/ui/tutorials.svg">
        <x-slot:sup>Рекомендации</x-slot>
        <x-slot:title>Графические материалы</x-slot>

        <x-slot:description>
            Мы собрали несколько рекомендаций на случай, если вы захотите использовать наши логотипы, чтобы
            дать обратную ссылку на нас
        </x-slot>
    </x-header>

    <x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                <div class="col-xxl-8 mx-auto">
                    <main data-controller="prism">

                        <h2>Наше сообщество - Laravel Russian Community</h2>

                        <p>При упоминании, рекомендуется использовать один из следующих форматов:</p>

                        <div class="bg-body p-xl-5 p-4 rounded mb-3">
                            <div class="row row g-2">

                            <div class="col-md-6 d-flex flex-column h-100">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><span class="me-2">✅</span>Laravel Russian Community</li>
                                    <li class="mb-2"><span class="me-2">✅</span>Русскоязычное сообщество Laravel</li>
                                    <li class="mb-2"><span class="me-2">✅</span>Laravel на русском</li>
                                </ul>
                            </div>

                            <div class="col-md-6 d-flex flex-column h-100">
                                <ul class="list-unstyled mt-3 mt-md-0">
                                    <li class=""><span class="me-2">❌</span>Community of Laravel in Russia</li>
                                    <li class=""><span class="me-2">❌</span>Русское сообщество Laravel</li>
                                    <li class=""><span class="me-2">❌</span>Русское Laravel сообщество</li>
                                </ul>
                            </div>

                        </div>

                        </div>

                        <p class="">Эти форматы наилучшим образом отображают состав нашей аудитории,
                                                      включая русскоязычных участников из России, Беларуси, Украины и других стран</p>

                        <blockquote class="docs-blockquote-note">
                            <div>
                            <p>
                                Использование данных неправильных вариаций может создать неверное представление о нашем
                                сообществе, подразумевая, что мы ограничены только участниками из России, что не соответствует
                                действительности.
                            </p>
                            </div>
                        </blockquote>


                        <h2>Графические материалы для партнёров</h2>

                        <p>Мы являемся неофициальным сообществом, которое посвящено Laravel. Чтобы соблюсти авторские
                           права и другие правовые нормы, рекомендуем использовать наши собственные графические
                           материалы, которые однозначно ассоциируются с нами.</p>


                        <p>Наш маскот - Иван Царевич, воплощает в себе мифический образ главного героя русских народных
                        сказок. По повелению или по своему собственному долгу, Иван Царевич всегда готов браться за выполнение
                        опасных и сложных задач, связанных с риском и требующих героических усилий. Он проходит через
                        испытания, которые делают его достойным статуса "царевича".</p>

                        <div class="row g-4">
                            <div class="col mb-3">
                                <a href="/img/ivan.svg" download
                                   class="bg-black p-5 rounded d-block">
                                    <img src="/img/ivan.svg" height="150">
                                </a>
                            </div>


                            <div class="col mb-3">
                                <a href="/img/ivan.svg" download
                                   class="bg-white p-5 rounded d-block">
                                    <img src="/img/ivan.svg" height="150">
                                </a>
                            </div>
                        </div>

                        <p>Вариации:</p>

                        <div class="row row-cols-2 g-4">
                            <div class="col mb-3">
                                <a href="/img/assets/avatar1.svg" download
                                   class="bg-white p-5 rounded d-block">
                                    <img src="img/assets/avatar1.svg" height="150">
                                </a>
                            </div>

                            <div class="col mb-3">
                                <a href="/img/assets/avatar2.svg" download
                                   class="bg-white p-5 rounded d-block">
                                    <img src="img/assets/avatar2.svg" height="150">
                                </a>
                            </div>

                            <div class="col">
                                <a href="/img/assets/avatar3.svg" download
                                   class="bg-white p-5 rounded d-block">
                                    <img src="img/assets/avatar3.svg" height="150">
                                </a>
                            </div>

                            <div class="col">
                                <a href="/img/assets/avatar4.svg" download
                                   class="bg-white p-5 rounded d-block">
                                    <img src="img/assets/avatar4.svg" height="150">
                                </a>
                            </div>
                        </div>


                        <h2>Логотип сообщества</h2>

                        <p>Мы заботимся о соблюдении авторских прав и уважении торговых знаков в нашем сообществе. В
                           связи с этим, учитывая, что Laravel и его официальный логотип являются торговыми знаками,
                           принадлежащими их законным владельцам, мы использовали модифицированную версию официального
                           логотипа Ларавел:</p>

                        <div class="row">
                            <div class="col">
                                <a href="/img/logo.svg" download
                                   class="bg-black p-5 rounded d-block">
                                    <img src="/img/logo.svg" width="400">
                                </a>
                            </div>


                            <div class="col">
                                <a href="/img/logo.svg" download
                                   class="bg-white p-5 rounded d-block">
                                    <img src="/img/logo.svg" width="400">
                                </a>
                            </div>
                        </div>

                        <blockquote class="docs-blockquote-note">
                            <div>
                            <p>
                                Если вы планируете использовать логотип Laravel в коммерческих целях или в любом контексте,
                                который может быть считан как нарушение авторских прав, мы настоятельно рекомендуем получить
                                разрешение у владельца торгового знака, а не фанатского сообщества.
                            </p>
                            </div>
                        </blockquote>

                        <h2>Наше наследие</h2>

                        <p>
                            За годы нашего существования у нас было несколько графических материалов. Хотя некоторые из
                            них больше не рекомендуются для новых публикаций или использования, они остаются важной
                            частью нашей истории и нашего наследия.
                        </p>

                        <p>
                            Спасибо за помощь в создании нашего незабываемого наследия:
                        </p>

                        <div class="row">
                            <div class="col">
                                <a href="/img/assets/legends/human.png" download
                                   class="bg-black p-5 rounded d-block">
                                    <img src="/img/assets/legends/human.png" height="150">
                                </a>
                            </div>


                            <div class="col">
                                <a href="/img/assets/legends/human.png" download
                                   class="bg-white p-5 rounded d-block">
                                    <img src="/img/assets/legends/human.png" height="150">
                                </a>
                            </div>
                        </div>

                    </main>
                </div>
            </div>
        </div>
    </x-container>

@endsection
