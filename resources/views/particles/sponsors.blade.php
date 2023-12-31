<x-container class="mt-5 py-5">
    <div class="row g-5 justify-content-center align-items-end mb-5">
        <!-- Right side START -->
        <div class="col-xl-6 text-center text-xl-start">
            <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Спонсоры</span>
            <!-- Title -->
            <h2 class="display-5 fw-semibold mb-0">Помощь в разработки вашего проекта на Laravel</h2>
        </div>
        <!-- Right side END -->

        <!-- Left side START -->
        <div class="col-lg-6 position-relative">
            <p>
                Независимо от сложности вашего проекта эти кампании готовы помочь воплотить ваши идеи в элегантные приложения.
            </p>

            <a href="{{ route('advertising') }}"
               class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">Присоединиться <x-icon
                    path="bs.arrow-right" /></a>
        </div>
        <!-- Left side END -->
    </div>

    <div class="row row-cols-md-3 g-5">
        <div class="col">
            <div class="p-5 bg-body-tertiary rounded d-flex flex-column h-100">
                <img src="https://appfox.ru/local/templates/custom/images/elements/logo.svg" class="d-block mb-3 me-auto" height="48">
                <p class="fw-normal m-0">
                    Входим в ТОП-3 рейтинга Рунета IT студий и самая большая команда в Москве (100+ человек) - штат
                    проверенных специалистов.
                </p>
            </div>
        </div>
        <div class="col">
            <div class="p-5 bg-body-tertiary rounded d-flex flex-column h-100">
                <img src="/img/agency/kirschbaum.svg" class="d-block mb-3 me-auto" height="48">
                <p class="fw-normal m-0">
                    Дизайн и технологии —
                    лишь инструменты для решения бизнес-задач. Результат нашей работы — это продукт, сделанный
                    вовремя и в рамках ожиданий заказчика.
                </p>
            </div>
        </div>
        <div class="col">
            <div class="p-5 bg-body-tertiary rounded d-flex flex-column h-100">
                <img src="/img/agency/kirschbaum.svg" class="d-block mb-3 me-auto" height="48">
                <p class="fw-normal m-0">
                    Независимо от сложности вашего проекта эти агентства обладают квалифицированными командами
                    разработчиков, готовыми воплотить ваши идеи в элегантные приложения.
                </p>
            </div>
        </div>
    </div>
</x-container>
