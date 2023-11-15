<div id="comment-{{ $comment->getKey() }}" class="position-relative my-4">

    @if($comment->trashed())
        <div class="alert alert-warning opacity-25">Сообщение было удалено</div>
    @endif

    @if(!$comment->trashed())
        <div class="d-flex position-relative overflow-hidden">
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
                        <a href="#comment-{{ $comment->getKey() }}"
                           class="link-body-emphasis text-decoration-none">
                            <time
                                datetime="{{ now()->toISOString() }}">{{ $comment->created_at->diffForHumans() }}</time>
                        </a>

                        @can('update', $comment)
                            ·
                            <a href="{{ route('comments.show.edit', $comment) }}" data-turbo-method="post" class="link-body-emphasis text-decoration-none">Редактировать</a>
                        @endcan

                        @can('delete', $comment)
                            · <a href="{{ route('comments.delete', $comment) }}"
                                 class="link-body-emphasis text-decoration-none"
                                 data-turbo-method="DELETE"
                                 data-turbo-confirm="Вы уверены, что хотите удалить комментарий?">
                                    Удалить
                                </a>
                        @endcan
                    </div>

                    {{--
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown" aria-expanded="false">
                            <x-icon path="bs.three-dots"/>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    --}}
                </div>


                @if($edit === $comment->getKey())
                        <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}"
                              class="mb-1 d-flex flex-column position-relative">
                            @method('PUT')
                            <textarea required class="form-control mb-3" name="message" rows="3">{{ $comment->comment }}</textarea>
                            <div
                                class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-3 mx-5">
                                <button type="submit" class="btn btn-primary">Ответить</button>
                            </div>
                        </form>
                @else
                    <p class="mb-1">{!! $comment->prettyComment() !!}</p>
                @endif

                <div class="d-flex align-items-center">
                    <a class="d-flex align-items-center text-danger text-decoration-none me-4" href="#!">
                        <x-icon path="bs.heart-fill"/>
                        <span class="ms-2">12</span>
                    </a>

                    @can('reply', $comment)
                        @if($reply !== $comment->getKey())
                            <a href="{{ route('comments.show.reply', $comment) }}" class="btn btn-light btn-sm"
                               data-turbo-method="post">Ответить</a>
                        @endif
                    @endcan
                </div>
            </div>
        </div>

        @if($reply === $comment->getKey())
            @can('reply', $comment)
                <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}"
                      class="col-8 ms-auto my-2 d-flex flex-column position-relative">
                    <textarea required class="form-control mb-3" name="message" rows="3"></textarea>
                    <div
                        class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-3 mx-5">
                        <button type="submit" class="btn btn-primary">Ответить</button>
                    </div>
                </form>
            @endcan
        @endif
    @endif

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
