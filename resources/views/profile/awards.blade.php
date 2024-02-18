@extends('profile.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto">
        <div class="bg-body-tertiary rounded p-md-5">

            @forelse($user->achievements as $achievement)
                <div class="d-flex text-body-secondary gap-4  {{ $loop->last ? '' : 'mb-4' }}">
                    <div class="col-lg-3">
                        <img src="{{ $achievement->presenter()->image() }}" class="flex-shrink-0 rounded img-fluid">
                    </div>

                    <div class="mb-0 text-balance py-2">
                        <div class="d-block fw-bolder h3 fw-bolder mb-2">{{ $achievement->presenter()->name }}</div>
                        <p class="mb-0">{{ $achievement->presenter()->description }}</p>
                    </div>
                </div>
            @empty
                <div class="p-4 p-md-5">
                    <div class="text-center mb-0">
                        У пользователя ещё нет наград
                    </div>
                </div>
            @endforelse

        </div>
    </div>
@endsection
