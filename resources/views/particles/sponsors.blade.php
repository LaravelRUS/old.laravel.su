<x-container class="mt-5 py-5">
    <div class="row g-4 g-md-5 justify-content-center align-items-end mb-5">
        <!-- Right side START -->
        <div class="col-lg-6">
            <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Спонсоры</span>
            <!-- Title -->
            <h2 class="display-5 fw-semibold mb-0">Помощь в разработке вашего проекта на Laravel</h2>
        </div>
        <!-- Right side END -->

        <!-- Left side START -->
        <div class="col-lg-6 position-relative">
            <p>
                Независимо от сложности вашего проекта эти кампании готовы помочь воплотить ваши идеи в элегантные приложения.
            </p>

            <a href="{{ route('advertising') }}"
               class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">Присоединиться <x-icon
                    path="bs.arrow-right" /></a>
        </div>
        <!-- Left side END -->
    </div>

    <div class="row row-cols-lg-3 g-4 g-md-5">
        <div class="col">
            <div class="p-5 bg-body-tertiary rounded d-flex flex-column h-100 position-relative">
                <img src="https://appfox.ru/local/templates/custom/images/elements/logo.svg" class="d-block mb-4 me-auto" height="64">
                <p class="fw-normal">
                    Входим в ТОП-3 рейтинга Рунета IT студий и самая большая команда в Москве (100+ человек) - штат
                    проверенных специалистов.
                </p>
                <a class="icon-link icon-link-hover stretched-link link-body-emphasis text-decoration-none small mt-auto" href="{{ route('idea.index') }}">
                    Перейти
                    <x-icon path="bs.arrow-right"/>
                </a>
            </div>

        </div>
        <div class="col">
            <div class="p-5 bg-body-tertiary rounded d-flex flex-column h-100 position-relative">
                <img src="/img/resources/tnspodcast.svg" class="d-block mb-4 me-auto" height="64">
                <p class="fw-normal">
                    Подкаст c зажигательными эпизоды, которые заставят
                    задуматься и приведут к новым перспективам.
                </p>
                <a class="icon-link icon-link-hover stretched-link link-body-emphasis text-decoration-none small mt-auto" href="{{ route('idea.index') }}">
                    Перейти
                    <x-icon path="bs.arrow-right"/>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="p-5 bg-body-tertiary rounded d-flex flex-column h-100 position-relative">
                <img src="https://laravel-idea.com/img/logo.svg" class="d-block mb-4 me-auto" height="64">
                <p class="fw-normal">
                    Laravel Idea — среда разработки на базе PhpStorm, ориентированная на эффективность и
                    производительность.
                </p>
                <a class="icon-link icon-link-hover stretched-link link-body-emphasis text-decoration-none small mt-auto" href="{{ route('idea.index') }}">
                    Перейти
                    <x-icon path="bs.arrow-right"/>
                </a>
            </div>
        </div>
    </div>
</x-container>
