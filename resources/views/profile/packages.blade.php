@extends('profile.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto">
        <div class="bg-body-tertiary rounded overflow-hidden my-5 px-5 py-4">
            <div class="row align-items-center">
                <div class="col-xxl-auto">
                    <div class="avatar avatar-sm">
                        <img class="avatar-img rounded-circle" src="{{ $user->avatar }}"
                             alt="{{ $user->title }}">
                    </div>
                </div>

                <div class="col mx-auto">
                    <p class="opacity-50 mb-0">Новая запись</p>
                </div>

                <div class="col-xxl-auto">
                    <a href="{{ route('packages.create') }}" class="btn btn-outline-primary">Новая запись</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-md-12 mx-auto">
        @if($packages->isEmpty())
            <div class="bg-body-tertiary rounded p-5 rounded">
                <div class="p-5">
                    @if ($user->id === Auth::user()?->id)
                        <div class="text-center mb-3">
                            Добавьте пакет
                        </div>
                        <div class="text-center">
                            <a href="{{ route('packages.create') }}" class="btn btn-secondary">Создать запись</a>
                        </div>
                    @else
                        <div class="text-center mb-3">
                            Нет пакетов
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="row row-cols-sm-2 align-items-center g-5 mb-4">

                @foreach ($packages as $package)
                    @include('particles.package')
                @endforeach
            </div>
        @endif
            {{ $packages->links() }}

    </div>
@endsection
