@php
    if (isset($approved) and $approved == true) {
        $comments = $model->approvedComments;
    } else {
        $comments = $model->comments;
    }
@endphp

@if($comments->count() < 1)
    <div class="alert alert-warning p-5">Тут ещё нет комментариев</div>
@endif

@php
    $grouped_comments = $comments->sortBy('created_at')->groupBy('child_id');
@endphp

<x-stream target="comments">
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
</x-stream>
