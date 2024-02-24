@php
    $comments = $model->comments;
@endphp

<turbo-frame id="comments-frame" data-turbo-temporary>
    <div id="comments">
        <x-container>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <p class="h5 mb-3 ms-3">
                        @if($comments->count() < 1)
                            Тут ещё нет комментариев.
                        @else
                            {{ trans_choice('{1} :count комментарий|[2,4] :count комментария|:count комментариев', $comments->count()) }}
                        @endif
                    </p>
                </div>

                @php
                    $grouped_comments = $comments->sortBy([['likers_count', 'desc'], 'created_at'])->groupBy('parent_id');
                @endphp

                <div class="bg-body-tertiary p-4 p-xl-5 rounded">
                    <div class="row">
                        <div class="col-12 col-lg-8 mx-auto comments-wrapper">


                            <div id="comments-wrapper">
                                @foreach($grouped_comments as $comment_id => $comments)
                                    {{-- Process parent nodes --}}
                                    @if($comment_id == '')
                                        @foreach($comments as $comment)
                                            @include('comments._comment', [
                                                'comment' => $comment,
                                                'grouped_comments' => $grouped_comments,
                                                'maxIndentationLevel' => $maxIndentationLevel ?? 3,
                                            ])
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                            @include('particles.comments.form', ['model' => $model])
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </div>
</turbo-frame>
