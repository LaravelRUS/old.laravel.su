@extends('html')
@section('title', 'Раскрой секреты своего ремесла')

@section('body')

@php
$evalWrongWay = base64_encode("Уважай мгновения, которые потратил тут и обрати взор назад. Загляни в прошлое с благодарностью и мудростью, чтобы найти новый путь вперед.");

$helpCaesarCipher = (new \App\CaesarCipher(11))->encrypt('Верно, но взгляд нужно в другую сторону.');
@endphp


<x-container>
    <img src="/img/ui/items.svg">
</x-container>

<x-header>
    <x-slot:sup>Будь как дома, путник</x-slot>
    <x-slot:title>Раскрой секреты своего ремесла</x-slot>

    <x-slot:description>
        Добро пожаловать в увлекательную игру-квест!
    </x-slot>

    <x-slot:content>
    </x-slot:content>
</x-header>

<!--
<x-container>
        <img src="/img/ui/carpet.png" class="img-fluid">
</x-container>
-->


<x-container>

    <div class="row g-5 pb-lg-5 align-items-center" data-controller="open-quiz">
        <div class="col-md-6">
            <div class="mb-4 text-balance bg-body-tertiary rounded p-4 p-xl-5 position-relative">
                <figure class="position-absolute top-0 start-0 translate-middle z-n1 ms-4">
                    <img src="/img/ui/chest.svg" height="130">
                </figure>


                <p>Вновь приветствую тебя, путник, я - мастер.</p>

                <p>Многие годы я посвятил своему ремеслу и оттачивал свои навыки.
                                Сегодня настал день, когда я готов передать свои знания достойному наследнику.
                                </p>

                <p class="mb-0">
                    Однако, будь начеку, ведь перед тобой раскинуты множество испытаний и загадок. Каждая загадка открывает дверь к следующей,
                    и только преодолев все трудности, ты сможешь достичь своей цели.
                </p>

            </div>

            <div class="mt-auto">
                <div class="d-flex align-items-center">
                    <img alt="image" height="50" class="rounded-circle"
                         src="/img/avatars/avatar2.svg">
                    <div class="ms-3 lh-1">
                        <div class="fw-bolder mb-1">Неизвестный мастер</div>
                        <small class="opacity-50">Добродушный дедушка</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <main class="post position-relative opacity-50 d-flex flex-column h-100">


                <pre class="rounded position-relative overflow-hidden p-4 language-php mt-auto" tabindex="0"><code
                        class="language-php" title="<?php echo "<?php eval(base64_decode($evalWrongWay))"?>">// Позволь оценить эстетику твоего мастерства
// Выполни код:
{{ \Illuminate\Support\Str::of($evalWrongWay)->explode('/')->map(fn($line) => "$line/")->join("\n") }}
</code></pre>
            </main>
        </div>

        <div class="col-6">

            {{--
            <img src="/img/gusli.svg" class="img-fluid d-block ms-auto">
--}}
            <main class="post position-relative opacity-50">


                <pre class="rounded position-relative overflow-hidden p-4 language-php" tabindex="0"><code
                        class="language-php">// Информация о Горыныче
return response()->json([
    'status'   => 'Охраняет'
    'location' => 'Калинов Мост',
])->header('X-Goronich-Key', '{{ $helpCaesarCipher }}');
</code></pre>
            </main>
        </div>




        <div class="col-md-6">
            <div class="mb-4 text-balance bg-body-tertiary rounded p-4 p-xl-5 position-relative">
                <p>Ах, я вижу, что ты стойкий и добрый человек.</p>

                <p class="mb-0">По этому в помощь тебе я оставила несколько <abbr
                        title="Используй один-один">подсказок</abbr>, но помни, что есть события которые будут сбивать тебя с пути.
                </p>
            </div>

            <div class="mt-auto">
                <div class="d-inline-flex align-items-center"
                     title="Что подсказку? Так быстро? Думаю тебе стоит открыть летопись и посмотреть все предупреждения.">
                    <img alt="image" height="50" class="rounded-circle"
                         src="/img/avatars/avatar.svg">
                    <div class="ms-3 lh-1">
                        <div class="fw-bolder mb-1">Василиса</div>
                        <small class="opacity-50">Внучка мастера</small>
                    </div>
                </div>
            </div>

        </div>


        {{--
        <div class="col-md-6 position-relative">
            <figure class="text-primary mb-3 z-n1">
                <img src="/img/bird.svg" class="z-n1 user-select-none d-none d-xxl-block">
            </figure>
        </div>
--}}

        <div class="col-md-6 position-relative">

            <div class="mb-4 text-balance bg-body-tertiary rounded p-4 p-xl-5 position-relative">
                <p>Будь настойчивым и внимательным, чтобы раскрыть все загадки и достичь успеха.</p>
                <p class="mb">Отправляйся в путь!</p>

                <details class="mb-0">
                    <summary class="d-block d-md-inline-block btn btn-primary me-3" data-action="click->open-quiz#greet">Я готов начать!</summary>
                    <span class="user-select-all mb-0 mt-3">Ты уже начал! Продолжай.</span>
                </details>
            </div>

            <div class="mt-auto">
                <div class="d-flex align-items-center">
                    <img alt="image" height="50" class="rounded-circle"
                         src="/img/avatars/avatar2.svg">
                    <div class="ms-3 lh-1">
                        <div class="fw-bolder mb-1">Неизвестный мастер</div>
                        <small class="opacity-50">Добродушный дедушка</small>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 position-relative">
            <img src="/img/ivan.svg" class="d-block img-fluid p-5">
        </div>

    </div>

</x-container>



{{--
<x-container>
    <div class="p-4 p-xl-5 bg-body-secondary rounded-4 position-relative" data-controller="open-quiz">
        <figure class="position-absolute top-0 start-0 translate-middle z-n1 ms-4">
            <x-icon path="l.cube" width="46" height="53" fill="none"/>
        </figure>


        <div class="row align-items-center">
            <div class="col-lg-6">
                <p class="display-6 fw-bold">Скажи как будешь готов, ладно?</p>
                <p class="mb-3 text-balance">
                    Как только ты почувствуешь готовность взять на себя вызов, нажми на кнопку:
                </p>

                <details>
                    <summary class="d-block d-md-inline-block btn btn-primary me-3"
                             data-action="click->open-quiz#greet">Я готов начать!
                    </summary>
                    <span class="user-select-all mb-0 mt-3">Ты уже начал! Продолжай.</span>
                </details>
            </div>

            <div class="col-lg-3">
                <img src="/img/ui/chest.svg" class="img-fluid">
            </div>
        </div>

    </div>
</x-container>
--}}

<x-container>
    <hr class="w-25 my-5">

    <div class="row">
        <div class="col-12 col-md-4">
            <ul class="nav justify-content-start align-items-center list-unstyled d-flex mb-4">
                <li class="">
                    <a href="https://vk.com/laravel_rus" class="link-body-emphasis">
                        <x-icon path="i.vk" width="24" height="24"/>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://t.me/laravelrus" class="link-body-emphasis">
                        <x-icon path="bs.telegram" width="24" height="24"/>
                    </a>
                </li>
            </ul>

            <p class="small text-muted mb-2">
                <span class="text-primary me-1">*</span>
                Что бы не портить игру себе или коллегам, пожалуйста не раскрывайте тайны уже пройденных этапов в общих телеграм чатах или других
                группах. Пусть каждый пройдет свой путь самостоятельно.
            </p>
        </div>

        <div class="col-12 col-md-auto ms-auto">
            <div class="navbar navbar-dark">
                <div class="nav flex-column">
                    <form data-controller="theme" data-action="change->theme#toggleTheme" data-turbo-permanent
                          class="btn-group" role="group" aria-label="Тема оформления" id="theme-checker-group">
                        <input type="radio" value="auto" data-theme-target="preferred" class="btn-check"
                               name="theme-checker" id="theme-checker-auto" autocomplete="off" checked>
                        <label class="btn btn-outline-secondary d-inline-flex align-items-center py-2" for="theme-checker-auto">
                            <x-icon path="i.theme-auto" class="my-1" width="1rem" height="1rem" />
                        </label>

                        <input type="radio" value="light" data-theme-target="preferred" class="btn-check"
                               name="theme-checker" id="theme-checker-light" autocomplete="off">
                        <label class="btn btn-outline-secondary d-inline-flex align-items-center" for="theme-checker-light">
                            <x-icon path="i.theme-light" class="my-1" width="1rem" height="1rem" />
                        </label>

                        <input type="radio" value="dark" data-theme-target="preferred" class="btn-check"
                               name="theme-checker" id="theme-checker-dark" autocomplete="off">
                        <label class="btn btn-outline-secondary d-inline-flex align-items-center" for="theme-checker-dark">
                            <x-icon path="i.theme-dark" class="my-1" width="1rem" height="1rem" />
                        </label>
                    </form>
                </div>

            </div>
        </div>

    </div>
</x-container>





{{--
<x-container>
    <div class="row">
        <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
            <div class="col-xxl-8 mx-auto">
                <main data-controller="prism">

                    <p>
                        Ещё раз приветствую тебя, путник. Я мастер.
                        Долгие годы я провел за оттачиванием нашего ремесла, теперь же я готов передать свои знания тебе.
                        Но будь осторожен, впереди тебя ждут множество испытаний и загадок.
                    </p>


                    <p>Здесь ты сможешь развивать свою логику и интересно
                    провести время. Каждая загадка откроет перед тобой новые тайны и приблизит к заветной цели. Будь
                    настойчивым и внимательным, чтобы раскрыть все загадки и достичь успеха. Заварим чашку чая и отправимся
                    в удивительное путешествие по этим волнующим лабиринтам!</p>

                    <h2>Правила</h2>

                    <p>
                        Что бы не портить игру себе или коллегам, пожалуйста не раскрывайте уже пройденные этапы в чатах
                        или других группах. Пусть каждый пройдет свой путь самостоятельно.
                    </p>

                    <div class="bg-body p-xl-5 p-4 rounded mb-3">
                        <div class="row">

                            <div class="col-md-6 d-flex flex-column h-100">
                                <div class="mb-2">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><span class="me-2">✅</span>Laravel Russian Community</li>
                                        <li class="mb-2"><span class="me-2">✅</span>Русскоязычное сообщество Laravel</li>
                                        <li class="mb-2"><span class="me-2">✅</span>Laravel на русском</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex flex-column h-100">
                                <div class="mb-2">
                                    <ul class="list-unstyled">
                                        <li class=""><span class="me-2">❌</span>Community of Laravel in Russia</li>
                                        <li class=""><span class="me-2">❌</span>Русское сообщество Laravel</li>
                                        <li class=""><span class="me-2">❌</span>Русское Laravel сообщество</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                    <p class="">Эти форматы наилучшим образом отображают состав нашей аудитории,
                                включая русскоязычных участников из России,
                                Белоруссии, Украины и других стран</p>

                    <blockquote class="docs-blockquote-note">
                        <p>
                            Использование данных неправильных вариаций может создать неверное представление о нашем
                            сообществе, подразумевая, что мы ограничены только участниками из России, что не соответствует
                            действительности.
                        </p>
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
                        <p>
                            Если вы планируете использовать логотип Laravel в коммерческих целях или в любом контексте,
                            который может быть считан как нарушение авторских прав, мы настоятельно рекомендуем получить
                            разрешение у владельца торгового знака, а не фанатского сообщества.
                        </p>
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
                            <a href="/img/legend/human.png" download
                               class="bg-black p-5 rounded d-block">
                                <img src="/img/legend/human.png" height="150">
                            </a>
                        </div>


                        <div class="col">
                            <a href="/img/legend/human.png" download
                               class="bg-white p-5 rounded d-block">
                                <img src="/img/legend/human.png" height="150">
                            </a>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </div>
</x-container>
--}}

@endsection
