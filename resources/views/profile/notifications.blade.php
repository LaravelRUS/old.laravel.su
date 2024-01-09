@extends('profile.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto mb-3">
        @if($notifications->isEmpty())

                <div class="bg-body-tertiary rounded p-5 rounded">
                    <div class="p-md-5">
                        <div class="text-center mb-3">
                           Нет уведомлений
                        </div>
                    </div>
                </div>

        @else
            @foreach($notifications as $notification)
                    @include('particles.notification')
            @endforeach
            {{ $notifications->links() }}
        @endif
    </div>
@endsection
