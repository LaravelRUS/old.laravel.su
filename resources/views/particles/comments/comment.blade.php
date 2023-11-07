<div id="comment-{{ $comment->getKey() }}">
    <div class="my-4 d-flex">
        <div class="avatar avatar-sm me-3">
            <a href="#!">
                <img class="avatar-img rounded-circle"
                     src="{{ $comment->commenter->avatar }}" alt="{{ $comment->commenter->name }}">
            </a>
        </div>

        <div class="w-100">
            <div class="mb-2 d-flex">
                <h6 class="m-0 me-2">{{ $comment->commenter->name }}</h6>

                <div class="me-3 small opacity-50">
                    <a href="{{ \Illuminate\Support\Facades\URL::current() }}#comment-{{ $comment->getKey() }}"
                       class="link-body-emphasis text-decoration-none">
                        <time datetime="{{ now()->toISOString() }}">{{ $comment->created_at->diffForHumans() }}</time>
                    </a>

                    @can('update', $comment)
                        ·
                        <a href="#" data-bs-toggle="modal" data-bs-target="#comment-modal-{{ $comment->getKey() }}"
                           class="link-body-emphasis text-decoration-none">Редактировать
                        </a>
                    @endcan

                    @can('delete', $comment)
                        · <a href="{{ route('comments.destroy', $comment) }}"
                             class="link-body-emphasis text-decoration-none"
                             data-turbo-method="DELETE"
                             data-turbo-confirm="Вы уверены, что хотите удалить комментарий?">
                                Удалить
                            </a>
                    @endcan
                </div>
            </div>

            <p class="mb-1">{!! $comment->prettyComment() !!}</p>

            <div class="d-flex align-items-center">
                <a class="d-flex align-items-center text-danger text-decoration-none me-4" href="#!">
                    <x-icon path="bs.heart-fill"/>
                    <span class="ms-2">12</span>
                </a>

                @can('reply', $comment)
                    <a href="#" class="btn btn-light btn-sm" data-toggle="modal"
                       data-target="#reply-modal-{{ $comment->getKey() }}">Ответить</a>
                @endcan
            </div>

        </div>


        @can('update', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Временное редактирование</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <textarea required class="form-control" name="message"
                                              rows="6">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                        class="btn btn-sm btn-outline-secondary text-uppercase">Обновить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">@lang('comments::comments.reply_to_comment')</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">@lang('comments::comments.enter_your_message_here')</label>
                                    <textarea required class="form-control" name="message" rows="3"></textarea>
                                    <small
                                        class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase"
                                        data-dismiss="modal">@lang('comments::comments.cancel')</button>
                                <button type="submit"
                                        class="btn btn-sm btn-outline-success text-uppercase">@lang('comments::comments.reply')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>

    <?php
        if (!isset($indentationLevel)) {
            $indentationLevel = 1;
        } else {
            $indentationLevel++;
        }
    ?>


    {{-- Recursion for children --}}
    @if($grouped_comments->has($comment->getKey()))
        <div class="{{ $indentationLevel <= $maxIndentationLevel ? 'ms-5' : '' }}">
            @foreach($grouped_comments[$comment->getKey()] as $child)
                @include('particles.comments.comment', [
                    'comment' => $child,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        </div>
    @endif
</div>
