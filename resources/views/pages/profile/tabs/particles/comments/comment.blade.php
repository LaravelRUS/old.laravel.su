<div id="comment-{{ $comment->getKey() }}" class="position-relative my-4">

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
                    <a
                        @if(!is_null($comment->commentable))
                            href="{{route('post.show', $comment->commentable->slug)}}#comment-{{ $comment->getKey() }}"
                            data-turbo-frame="_top"
                        @endif
                       class="link-body-emphasis text-decoration-none">
                        <time
                            datetime="{{ now()->toISOString() }}">{{ $comment->created_at->diffForHumans() }}</time>
                    </a>

                    @can('update', $comment)
                        ·
                        <a href="{{ route('profile.comments.show.edit', $comment) }}" data-turbo-method="post"
                           class="link-body-emphasis text-decoration-none">Редактировать</a>
                    @endcan

                    @can('delete', $comment)
                        · <a href="{{ route('profile.comments.delete', $comment) }}"
                             class="link-body-emphasis text-decoration-none"
                             data-turbo-method="DELETE"
                             data-turbo-confirm="Вы уверены, что хотите удалить комментарий?">
                            Удалить
                        </a>
                    @endcan
                </div>
            </div>


            @if($edit === $comment->getKey())
                <form method="POST" action="{{ route('profile.comments.update', $comment->getKey()) }}"
                      class="mb-1 d-flex flex-column position-relative">
                    @method('PUT')
                    <textarea required class="form-control mb-3" name="message"
                              rows="3">{{ $comment->comment }}</textarea>
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

            </div>
        </div>
    </div>

</div>
