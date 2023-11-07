@extends('pages.profile.tabs.base')

@section('tab')
    @if($comments->isEmpty())
        @if ($isMyAccount)
            <div class="bg-body-tertiary rounded p-5">
                <div class="p-5">
                    <div class="text-center mb-3">
                        Вы не написали ни одного комментария
                    </div>
                    <div class="text-center">
                        <a href="{{ route('feed') }}" class="btn btn-secondary">Статьи</a>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-body-tertiary rounded p-5">
                <div class="p-5">
                    <div class="text-center mb-3">
                       Этот пользователь не оставил ни одного комментария
                    </div>
                </div>
            </div>
        @endif
    @else


        <turbo-frame id="comments-frame">
            <x-stream target="comments">
                <div class="col-xl-8 col-md-12 mx-auto mt-5 mb-3">
                    <div class="bg-body-tertiary  overflow-hidden px-5 py-3">
                                        @foreach($comments as $comment)
                                            @include('pages.profile.tabs.particles.comments.comment', [
                                                'comment' => $comment,
                                                'edit' => $edit ?? null,
                                            ])
                                        @endforeach
                    </div>
                </div>
            </x-stream>
        </turbo-frame>
    @endif
@endsection
