@extends('profile.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto">
        <x-new-item :user="$user" :link="route('meets.create')"/>
    </div>
    <div class="col-xl-8 col-md-12 mx-auto">
        @if($meets->isEmpty())
            <div class="bg-body-tertiary rounded p-5 rounded">
                <div class="p-5">
                    @if ($user->id === Auth::user()?->id)
                        <div class="text-center mb-3">
                            Добавьте событие
                        </div>
                        <div class="text-center">
                            <a href="{{ route('meets.create') }}" class="btn btn-secondary">Создать запись</a>
                        </div>
                    @else
                        <div class="text-center mb-3">
                            Нет событий
                        </div>
                    @endif
                </div>
            </div>
        @else
            @foreach ($meets as $meet)
                @include('particles.meet')
            @endforeach
        @endif


        {{ $meets->links() }}
    </div>
@endsection
