@extends('profile.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto mb-3">
        @if($comments->isEmpty())
            @if ($user->id === Auth::user()?->id)
                <div class="bg-body-tertiary rounded p-5 rounded">
                    <div class="p-md-5">
                        <div class="text-center mb-3">
                            Вы не написали ни одного комментария
                        </div>
                        <div class="text-center">
                            <a href="{{ route('feed') }}" class="btn btn-secondary">Статьи</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-body-tertiary rounded p-5 rounded">
                    <div class="p-md-5">
                        <div class="text-center mb-3">
                            Этот пользователь не оставил ни одного комментария
                        </div>
                    </div>
                </div>
            @endif
        @else
            @foreach($comments as $comment)
                <div class="bg-body-tertiary overflow-hidden px-5 py-3 rounded mb-4">
                    @include('comments.show')
                </div>
            @endforeach
            {{ $comments->links() }}
        @endif
    </div>
@endsection
