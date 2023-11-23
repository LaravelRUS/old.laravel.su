@extends('profile.base')

@section('tab')

    <div class="col-xl-8 col-md-12 mx-auto">
        @if($packages->isEmpty())
            <div class="bg-body-tertiary rounded p-5 rounded">
                <div class="p-5">
                    @if ($user->id === Auth::user()?->id)
                        <div class="text-center mb-3">
                            Добавьте пакет
                        </div>
                        <div class="text-center">
                            <a href="{{ route('packages.edit') }}" class="btn btn-secondary">Создать запись</a>
                        </div>
                    @else
                        <div class="text-center mb-3">
                            Нет пакетов
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="row row-cols-sm-2 align-items-center g-5">

                @foreach ($packages as $package)
                    <div class="col">
                        <div class="bg-body-tertiary p-5 rounded h-100 position-relative text-wrap text-break position-relative">
                            <p class="fs-4 fw-bolder">
                                {{ $package->name }}
                            </p>

                            <hr class="w-25">

                            <p class="line-clamp o-50 line-clamp-5 small">
                                {{ $package->description }}
                            </p>

                            <div class="row justify-content-between">
                                <div class="col-auto d-inline-flex align-items-center me-auto">
                                    <x-icon path="bs.star-fill" class="me-2 text-warning" />
                                    {{ $package->stars }}
                                </div>
                                <div class="col">
                                    <p class="text-end mb-0">
                                        <a href="{{ $package->website }}"
                                           class="link-body-emphasis stretched-link link-icon-animation text-decoration-none">Перейти
                                            <x-icon path="bs.arrow-right" />
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
            {{ $packages->links() }}

    </div>
@endsection
