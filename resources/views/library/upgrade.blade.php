@extends('layout')
@section('title', 'Почему нужно обновляться?')
@section('description', 'У любого программного обеспечения есть жизненный цикл, которого необходимо придерживаться.')
@section('content')

    <x-header>
        <x-slot:sup>Поддерживаемые версии</x-slot>
        <x-slot:title>Почему нужно обновляться?</x-slot>

        <x-slot:description>
            У любого программного обеспечения есть жизненный цикл,
            которого необходимо придерживаться
        </x-slot>

        <x-slot:content >
            <div class="d-none d-md-flex align-items-baseline lead fw-bold mx-md-auto text-md-center">
                <span class="d-inline-block mx-2 mx-sm-3 display-5 opacity-25">7.x</span>
                <span class="d-inline-block mx-2 mx-sm-3 display-4 opacity-50 border-5">8.x</span>
                <span class="d-inline-block mx-2 mx-sm-3 display-3 opacity-75">9.x</span>
                <span class="d-inline-block mx-2 mx-sm-3 display-1 border-bottom border-primary">10.x</span>
            </div>
        </x-slot:content>
    </x-header>

    <x-container>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        1
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Безопасность</h5>
                <p class="mb-0">
                    Защитите свой проект от угроз и сохраните свою репутацию.
                </p>
            </div>
            <div class="col-xl-8 position-sticky">
                <main class="bg-body-tertiary p-xl-5 p-4 rounded">
                    <p>
                        Никто не хочет, чтобы на его веб-сайте появилась
                        реклама казино или другие нежелательные материалы, которые могут нанести вред репутации или
                        привлечь нежелательную аудиторию.
                    </p>
                    <p>
                        Поддерживаемые версии Laravel представляют собой защищенное окружение для вашего проекта.
                        Например, многие уязвимости, обнаруженные в предыдущих версиях, исправляются в последующих
                        обновлениях, снижая вероятность успешной эксплуатации уязвимостей и обеспечивая более высокий
                        уровень безопасности.
                    </p>
                    <p>
                        Команда разработчиков активно отслеживает новые уязвимости и реагирует на них, предоставляя
                        обновления безопасности для текущих версий. Например, если была обнаружена уязвимость в
                        аутентификации, разработчики могут выпустить патч, который снизит вероятность успешной атаки.
                    </p>
                    <p>
                        Это также означает, что злоумышленникам будет сложнее получить доступ к чувствительным данным,
                        таким как информация о банковских картах пользователей.
                    </p>
                </main>
            </div>
        </div>


        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        2
                    </div>
                </div>
                <h5 class="fs-4 mt-2 fw-semibold">Трудозатраты</h5>
                <p class="mb-0">
                    Потеря времени на временные решения и накопление технического долга.
                </p>
            </div>
            <div class="col-xl-8 position-sticky">
                <main class="bg-body-tertiary p-xl-5 p-4 rounded">
                    <p>Отставание от своевременных обновлений ведет к увеличению трудозатрат и созданию лишних проблем.
                       Разберём почему игнорирование или низкий приоритет делает разработку неэффективной:</p>

                    <ol class="fw-bold">
                        1. Потеря времени на создание временных решений
                    </ol>
                    <p>Разработчики вынуждены тратить время на создание временных решений и костылей для работы с устаревшими компонентами, вместо использования стандартных средств и функциональности, доступных в новых версиях.</p>

                    <div class="p-3 rounded bg-body text-balance border border-dashed mb-4">
                        <p class="mb-0"><strong>Пример:</strong> Разработчики, использующие Laravel 5.0, разрабатывали собственную проверку, что бы клиент мог просматривать только свои заказы в интернет-магазине. Однако менее чем через полгода в версии 5.1 были представлены <code>Policies</code>, ставшие стандартом. Вместо обновления как можно скорее, увеличение кодовой базы лишь увеличивало время на последующее устранение технического долга.</p>
                    </div>

                    <ol class="fw-bold">
                        2. Усложнение процесса обновления
                    </ol>
                    <p>Большие разрывы в обновлениях создают снежный ком эффект, который требует значительных усилий и ресурсов для обновления проекта. Это может привести к тому, что если вы захотите обновиться, придется потратить на это несколько месяцев без внедрения какого-либо нового функционала.</p>

                    <div class="p-3 rounded bg-body text-balance border border-dashed mb-4">
                        <p  class="mb-0"><strong>Пример:</strong> Разработчики "Яндекс.Еда" пропустили три мажорных релиза, и полное <a href="https://habr.com/ru/companies/yandex/articles/756498/" target="_blank" rel="noreferrer">обновление заняло целый год</a>. За время накопления технического долга поддержка фреймворка, пакетов и самого PHP изменилась.</p>
                    </div>

                    <ol class="fw-bold">
                        3. Устранение технического долга
                    </ol>
                    <p>Те временные решения, которые создали разработчики на первом шаге, с большой вероятностью не будут оптимальными в новых версиях, так как "из коробки" будут доступны отраслевые решения. Так что разработчик теперь потратит время на то, чтобы избавиться от собственного ранее написанного кода (а это очень больно).</p>
                </main>
            </div>
        </div>



        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        3
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Производительность</h5>
                <p class="mb-0">
                    Простота. Скорость. Результат.
                </p>
            </div>
            <div class="col-xl-8 position-sticky">
                <main class="bg-body-tertiary p-xl-5 p-4 rounded">
                    <p>
                        Каждая новая версия Laravel включает улучшения, направленные на повышение производительности
                        приложения. Это может включать в себя оптимизацию запросов к базе данных, улучшение алгоритмов
                        маршрутизации и оптимизацию кода фреймворка.
                    </p>
                    <p>
                        Улучшенная производительность в свою очередь приводит к улучшению пользовательского опыта.
                        Быстрое время отклика, плавная навигация и отзывчивый интерфейс увеличивают удовлетворенность
                        пользователей и повышают вероятность их возвращения к приложению. Это способствует росту числа
                        активных пользователей и улучшению репутации бренда.
                    </p>
                    <p>
                        Увеличение скорости загрузки повышает конверсию и снижает показатель отказов, что прямым
                        образом влияет на доходы от онлайн-продаж. Также следует учитывать, что поисковые системы
                        учитывают скорость загрузки страниц при ранжировании результатов, что дает дополнительные
                        SEO-преимущества и увеличивает количество новых пользователей.
                    </p>
                </main>
            </div>
        </div>


        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        4
                    </div>
                </div>
                <h5 class="fs-4 mt-2 fw-semibold">Конкурентоспособность</h5>
                <p class="mb-0">
                    Использование современных технологий делает вас более привлекательными для лучших разработчиков.
                </p>
            </div>
            <div class="col-xl-8 position-sticky">
                <main class="bg-body-tertiary p-xl-5 p-4 rounded">
                    <p>
                        Использование поддерживаемых версий Laravel также облегчает процесс найма новых разработчиков.
                        Большинство опытных разработчиков предпочитают работать с современными и актуальными
                        технологиями. Кроме того, знание того, что проект использует поддерживаемые версии, может быть
                        важным моментом для кандидатов при принятии решения о присоединении к команде. Это также
                        позволяет обеспечить более плавный процесс адаптации новых членов команды, так как они уже
                        знакомы с особенностями работы с актуальными версиями Laravel.
                    </p>

                    <div class="p-3 rounded bg-body text-balance border border-dashed">
                        <p class="text-primary mb-1">Заинтересованы в найме новых сотрудников?</p>
                        <p>
                            Рекомендуем вам обратить внимание на раздел "<a href="{{ route('jobs') }}">Вакансии</a>".
                            Это идеальное место для публикации вакансий, особенно если вы ищете разработчиков, специализирующихся на
                            Laravel."
                        </p>
                    </div>
                </main>
            </div>
        </div>



    </x-container>


@endsection
