@include('comments.show', ['comment' => $comment])

<?php
if (!isset($indentationLevel)) {
    $indentationLevel = 1;
} else {
    $indentationLevel++;
}
?>

{{-- Recursion for children --}}
@if(isset($grouped_comments) && $grouped_comments->has($comment->getKey()))
    <div
        id="thread_comment_{{ $comment->getKey() }}"
        class="thread {{ $indentationLevel <= 3 ? 'ps-xl-5 ps-4 comment-reply' : 'position-relative overflow-hidden' }}">
        @foreach($grouped_comments[$comment->getKey()] as $child)
            @include('comments._comment', [
                'comment' => $child,
                'grouped_comments' => $grouped_comments
            ])
        @endforeach
    </div>
@else
    <div id="thread_comment_{{ $comment->getKey() }}" class="thread {{ $indentationLevel <= 3 ? 'ps-xl-5 ps-4 comment-reply' : 'position-relative overflow-hidden' }}">
    </div>
@endif

