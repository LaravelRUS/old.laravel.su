@extends('layout')
@section('title', $title)

@section('content')

    <div class="container my-5">

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-3 position-sticky top-0 py-3">


                <div class="mb-4">

                    <input class="form-control form-control-lg" type="text" placeholder="Поиск по документации..." aria-label=".form-control-lg example">

                    <ul class="list-unstyled ps-0 py-4" id="docs-menu">
                        @foreach($menu as $item)
                            <li class="mb-2">
                                <button class="btn btn-toggle d-flex align-items-center rounded border-0 collapsed text-body-secondary p-0 w-100 text-start"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ \Illuminate\Support\Str::slug($item['title']) }}-collapse"
                                        aria-expanded="true">
                                    {{ $item['title'] }}
                                </button>
                                <div class="collapse" id="{{ \Illuminate\Support\Str::slug($item['title']) }}-collapse" data-bs-parent="#docs-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                                        @foreach($item['list'] as $link)
                                            <li><a href="{{ $link['href'] }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded p-2">{{ $link['title'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 text-center text-xl-start">

                <div class="d-grid gap-3 d-md-flex justify-content-md-end mb-3">
                    <a href="#" class=""><span class="badge bg-primary-subtle text-primary rounded rounded-1 fs-6 fw-normal">Перевод отстаёт на 2 изменения</span></a>
                    <a href="{{ $originalLink }}" target="_blank" class="link-body-emphasis text-decoration-none">Посмотреть оригинал</a>
                </div>

                <main class="bg-body-tertiary p-5 rounded-5 shadow-sm">
                    {!! $text !!}
                </main>
            </div>
        </div>
    </div>
@endsection



