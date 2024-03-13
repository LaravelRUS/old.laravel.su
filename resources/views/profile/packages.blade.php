@extends('profile.base')

@section('tab')

    <div class="col-xl-8 col-md-12 mx-auto">
        <x-new-item :user="$user" :link="route('packages.create')"/>
    </div>

    <div class="col-xl-8 col-md-12 mx-auto">
        @if($packages->isEmpty())
            <div class="bg-body-tertiary rounded p-md-5 rounded">
                <div class="p-4 p-md-5">
                    @if ($user->id === Auth::user()?->id)
                        <div class="text-center mb-3">
                            Добавьте пакет
                        </div>
                        <div class="text-center">
                            <a href="{{ route('packages.create') }}" class="btn btn-secondary">Создать запись</a>
                        </div>
                    @else
                        <div class="text-center mb-0">
                            Нет пакетов
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="row g-4 row-cols-sm-2 mb-4">

                @foreach ($packages as $package)
                    @include('particles.package')
                @endforeach
            </div>
        @endif
            {{ $packages->links() }}

    </div>
@endsection
