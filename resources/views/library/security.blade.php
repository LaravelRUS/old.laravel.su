@extends('layout')
@section('title', 'Актуальный код')
@section('description', 'Код должен быть понятен всем членам команды и легко читаем для разработчиков, которые могут его изменять')
@section('content')

    <x-header align="align-items-end">
        <x-slot name="sup">Разработчикам</x-slot>
        <x-slot name="title">Советы по безопасности</x-slot>
        <x-slot name="description">
            Распространенные уязвимости и ошибки, для обеспечения безопасности ваших приложений Laravel
        </x-slot>
        <x-slot name="content">
            <figure class="d-none d-md-block">
                <x-icon path="l.dots" class="text-primary opacity-2 d-block mx-auto" height="300" width="300"/>
            </figure>
        </x-slot>
    </x-header>

    <x-container>

        @foreach([
        'basics.md',
        'auth.md',
        'cookie.md',
        'mass.md',
        'csrf.md',
        'exec.md',
        'headers.md',
        'hijacking.md',
        'path.md',
        'redirect.md',
        'sql.md',
        'upload.md',
        'xss.md'] as $key => $file)

            <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
                <div class="col-xl-4 position-sticky top-0 py-3">
                    <div class="mb-4">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                            {{ $key }}
                        </div>
                    </div>
                    <h5 class="fs-4 mt-2 fw-semibold">{{ $file }}</h5>
                    <p class="mb-0">
                        Правильный выбор имен переменных, классов и методов в Laravel играет ключевую роль в создании
                        чистого и понятного кода.
                    </p>
                </div>
                <div class="col-xl-8">
                    <main class="bg-body-tertiary p-xl-5 p-4 rounded shadow">
                        {!! \Illuminate\Support\Str::of(file_get_contents(storage_path('library/security/'.$file)))->markdown() !!}
                    </main>
                </div>
            </div>

        @endforeach

    </x-container>

@endsection
