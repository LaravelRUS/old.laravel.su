@extends('layout')
@section('title', $docs->title())

@section('content')

    <div class="container my-5">

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-3 position-sticky top-0 py-3">


                <div class="mb-4">

                    <input class="form-control form-control-lg" type="text" placeholder="Поиск по документации..." aria-label=".form-control-lg example">

                    <ul class="list-unstyled ps-0 py-4" id="docs-menu">
                        @foreach($docs->getMenu() as $item)
                            <li class="mb-2">
                                <button class="btn btn-toggle d-flex align-items-center rounded border-0 collapsed text-body-secondary p-0 w-100 text-start"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ \Illuminate\Support\Str::slug($item['title']) }}-collapse"
                                        aria-expanded="true">
                                    {{ $item['title'] }}
                                </button>


                                <div class="collapse {{ active(collect($item['list'])->map(fn($link)=> $link['href']), 'show') }}" id="{{ \Illuminate\Support\Str::slug($item['title']) }}-collapse" data-bs-parent="#docs-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                                        @foreach($item['list'] as $link)
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
                </div>
            </div>
            <div class="col-xl-9 text-center text-xl-start">

                <div class="d-grid gap-3 d-md-flex justify-content-md-end mb-3">
                    @if($docs->translationIsLagsBehind())
                        <a href="{{ route('status', $docs->version) }}#{{$docs->file}}" class=""><span class="badge bg-primary-subtle text-primary rounded rounded-1 fs-6 fw-normal">Перевод отстаёт на {{ $docs->countCommitsBehind() }} изменения</span></a>
                    @else
                        <span class="badge bg-success-subtle text-success rounded rounded-1 fs-6 fw-normal pe-none">Перевод актуален</span>
                    @endif

                    <a href="{{ $docs->goToOriginal() }}"
                       title="Посмотреть оригинал"
                       target="_blank"
                       class="link-body-emphasis text-decoration-none">
                        <x-icon path="bs.translate"/>
                    </a>
                </div>


                <main class="bg-body-tertiary p-5 rounded-5 shadow-sm">

                    @if($docs->isOlderVersion())
                        <div class="alert alert-warning rounded-1" role="alert">
                            ВНИМАНИЕ! Вы просматриваете документацию для старой версии Laravel.
                            Рассмотрите возможность обновления вашего проекта до Laravel 10.x.
                        </div>
                    @endif

                    {!! $text !!}
                </main>
            </div>
        </div>
    </div>
@endsection



