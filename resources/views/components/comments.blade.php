@php
    if (isset($approved) and $approved == true) {
        $comments = $model->approvedComments;
    } else {
        $comments = $model->comments;
    }
@endphp

<turbo-frame id="comments-frame">
    <x-stream target="comments">
        <div class="container my-5">

            <div class="col-xxl-8 mx-auto">
                <p class="h5 mt-5 mb-3 ms-3">
                    @if($comments->count() < 1)
                        Тут ещё нет комментариев
                    @else
                        {{ $comments->count() }} комментариев
                    @endif
                </p>
            </div>

            @php
                $grouped_comments = $comments->sortBy('created_at')->groupBy('child_id');
            @endphp

            <div class="bg-body-tertiary shadow-sm p-5 rounded">
                <div class="row">
                    <div class="col-12 col-xxl-8 mx-auto">


                        @foreach($grouped_comments as $comment_id => $comments)
                            {{-- Process parent nodes --}}
                            @if($comment_id == '')
                                @foreach($comments as $comment)
                                    @include('particles.comments.comment', [
                                        'comment' => $comment,
                                        'grouped_comments' => $grouped_comments,
                                        'maxIndentationLevel' => $maxIndentationLevel ?? 3
                                    ])
                                @endforeach
                            @endif
                        @endforeach


                        @include('particles.comments.form', ['model' => $model])
                    </div>
                </div>
            </div>
        </div>
    </x-stream>
</turbo-frame>
