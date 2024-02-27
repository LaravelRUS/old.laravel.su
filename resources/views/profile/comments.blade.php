@extends('profile.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto mb-3">
        @if($comments->isEmpty())
            <div class="bg-body-tertiary rounded p-md-5 rounded">
                <div class="p-4 p-md-5">
                    @if ($user->id === Auth::user()?->id)
                        <div class="text-center mb-0">
                            Вы не написали ни одного комментария
                        </div>
                    @else
                        <div class="text-center mb-0">
                            Этот пользователь не оставил ни одного комментария
                        </div>
                    @endif
                </div>
            </div>
        @else
            @foreach($comments as $comment)
                <div class="bg-body-tertiary overflow-hidden px-4 px-md-5 py-3 rounded mb-4">
                    @include('comments.show')
                </div>
            @endforeach
            {{ $comments->links() }}
        @endif
    </div>
@endsection
