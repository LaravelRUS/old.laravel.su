@extends('layout')
@section('title', $docs->title(). " Laravel ". $docs->version)

@section('content')

    <div class="container container-docs my-4 my-xxl-5 mx-auto">
        <div class="row gap-2 justify-content-center align-items-start position-relative mb-5">
            <div class="col-3 col-xl-2 order-md-first order-last position-sticky top-0 py-md-3 z-1 d-none d-lg-block doc-navigation">

                <div class="mb-md-4 ms-md-4 d-flex align-items-stretch flex-column offcanvas-md offcanvas-start" id="docs-menu">

                    {{--
                    <input class="form-control form-control-lg" type="text" placeholder="Поиск по документации..."
                        aria-label=".form-control-lg example">
--}}

                    <div class="d-flex align-items-center p-4 p-sm-0">
                        <select class="form-select form-select-sm rounded-3" onchange="Turbo.visit(this.value);">
                            <optgroup label="Версия">
                                @foreach (\App\Docs::SUPPORT_VERSIONS as $version)
                                    <option
                                        value="{{ route('docs', ['version' => $version]) }}"
                                        @selected(active(route('docs', ['version' => $version]).'*'))>{{ $version }}</option>
                                @endforeach
                            </optgroup>
                        </select>

                        @if($docs->behind() === null)
                            <a href="{{ route('status', $docs->version) }}#{{ $docs->file }}" class="mx-3 text-decoration-none text-secondary" title="Перевод не имеет метки">
                                ●
                            </a>
                        @elseif ($docs->behind() > 0)
                            <a href="{{ route('status', $docs->version) }}#{{ $docs->file }}" class="mx-3 text-decoration-none text-primary" title="Отстаёт на {{ $docs->behind() }} изменения">
                                ●
                            </a>
                        @else
                            <a href="{{ route('status', $docs->version) }}#{{ $docs->file }}" class="mx-3 text-decoration-none text-success" title="Перевод актуален">
                                ●
                            </a>
                        @endif

                        <a href="{{ $docs->getOriginalUrl() }}" title="Посмотреть оригинал" target="_blank"
                           class="link-body-emphasis text-decoration-none d-none d-md-block">
                            <x-icon path="i.translation" />
                        </a>
                    </div>

                    <ul class="list-unstyled p-4 px-md-0">
                        @foreach ($docs->getMenu() as $item)
                            <li class="mb-2">
                                <button
                                    class="btn btn-toggle d-flex align-items-center rounded border-0 collapsed text-body-secondary p-0 w-100 text-start"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#{{ \Illuminate\Support\Str::slug($item['title']) }}-collapse"
                                    aria-expanded="true">
                                    {{ $item['title'] }}
                                </button>

                                <div class="collapse {{ active(collect($item['list'])->map(fn($link) => $link['href']), 'show') }} mt-2"
                                    id="{{ \Illuminate\Support\Str::slug($item['title']) }}-collapse"
                                    data-bs-parent="#docs-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-2">
                                        @foreach ($item['list'] as $link)
                                            <li>
                                                <a href="{{ $link['href'] }}"
                                                    class="{{ active(url($link['href']), 'active', 'link-body-emphasis') }} d-inline-flex text-decoration-none rounded p-2">
                                                    {{ $link['title'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <x-docs.banner />

                </div>
            </div>
            <div class="px-0 px-md-2 px-xl-3 col-md-10 col-lg-8 col-xl-7 col-xxl-6 order-md-1 order-first">

                <main class="bg-body-tertiary p-4 p-xl-5 rounded documentations position-relative" data-controller="prism">
                    <h1 class="display-6 fw-bold text-body-emphasis">{{ $docs->title() }}</h1>
                    @if ($docs->isOlderVersion())
                        <blockquote class="docs-blockquote-note position-relative  mt-4" role="alert">
                            <a href="{{ route('library.upgrade') }}" class="text-decoration-none link-body-emphasis stretched-link icon-link-hover p-4 text-balance">
                                <div>
                                    <div class="mb-1 d-block fw-bold">Осторожно! Вы просматриваете документ для прошлой версии.</div>
                                    <div class="mb-0 d-block opacity-75">Рассмотрите возможность обновления вашего проекта до актуальной версии <code>{{ \App\Docs::DEFAULT_VERSION }}</code>.
                                        <span class="text-decoration-underline">Почему это важно?</span>
                                    </div>
                                </div>
                            </a>
                        </blockquote>
                    @endif

                    <div class="d-block d-xl-none mt-3">
                        <x-docs.anchors :content="$content"/>
                    </div>
                    <x-docs.content :content="$content"/>
                </main>
            </div>
            <div class="col-3 col-xl-2 order-last position-sticky top-0 py-md-3 z-1 d-none d-xl-block doc-navigation">
                <div class="mb-md-4 d-flex align-items-stretch flex-column offcanvas-md offcanvas-start" id="docs-menu">
                    <main>
                        <x-docs.anchors :content="$content"/>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
