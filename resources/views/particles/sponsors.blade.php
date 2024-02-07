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
            <p class="text-balance">
                Независимо от сложности проекта эти кампании помогают сообществу и всем его участникам воплощать идеи в элегантные приложения.
            </p>

            <a href="{{ route('advertising') }}"
               class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">Присоединиться <x-icon
                    path="i.arrow-right" class="bi" /></a>
        </div>
        <!-- Left side END -->
    </div>

    <div class="row row-cols-lg-3 row-cols-1 g-4 sponsors">
        <div class="col">
            <div class="p-4 p-xl-5 bg-body-tertiary rounded d-flex flex-column h-100 position-relative">
                <img src="/img/sponsors/am.svg" class="d-block mb-4 me-auto" height="64">
                <p class="fw-normal">
                    Инструменты для управления эмоциями, которые помогают людям контролировать свою жизнь и лучше понимать себя.
                </p>
                <a class="icon-link icon-link-hover stretched-link link-body-emphasis text-decoration-none small mt-auto"
                   href="https://assisted-mindfulness.com/">
                    Перейти
                    <x-icon path="i.arrow-right" class="bi"/>
                </a>
            </div>

        </div>
        <div class="col">
            <div class="p-4 p-xl-5 bg-body-tertiary rounded d-flex flex-column h-100 position-relative">
                <img src="/img/sponsors/soidet.svg" class="d-block mb-4 me-auto" height="64">
                <p class="fw-normal">
                    Подкаст c зажигательными эпизоды, которые заставят
                    задуматься и приведут к новым перспективам.
                </p>
                <a class="icon-link icon-link-hover stretched-link link-body-emphasis text-decoration-none small mt-auto"
                   href="https://www.youtube.com/@agoalofalife/videos">
                    Перейти
                    <x-icon path="i.arrow-right" class="bi"/>
                </a>
            </div>
        </div>
        <div class="col d-none d-lg-block">
            <div class="p-4 p-xl-5 bg-body-tertiary rounded d-flex flex-column h-100 position-relative d-flex bg-opacity-75 opacity-50 align-items-center">
                <a class="icon-link icon-link-hover stretched-link link-body-emphasis text-decoration-none d-block text-center my-auto" href="{{ route('advertising') }}">

                    <span class="d-block mb-3">
                         <x-icon path="i.sun" width="3rem" height="3rem"></x-icon>
                        {{--
                        <x-icon path="bs.patch-plus-fill" width="3rem" height="3rem"></x-icon>
                        --}}
                    </span>

                    Присоединится
                </a>
            </div>
        </div>
    </div>
</x-container>
