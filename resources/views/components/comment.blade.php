<div id="comment_{{ $comment->getKey() }}" class="comment mt-4">

    @if($comment->trashed())
        <div class="d-flex position-relative overflow-hidden align-items-center mb-xl-5 mb-3">
            <div class="avatar avatar-sm me-3">
                <img class="avatar-img rounded-circle"
                     src="/img/ui/user-deleted.png" alt="Комментарий был удалён">
            </div>

            <div class="w-100 opacity-50">
                <p class="mb-0">Сообщение было удалено</p>
            </div>
        </div>
    @else
        <div class="d-flex position-relative overflow-hidden">
            <div class="avatar avatar-sm me-3">
                <a href="{{  route('profile', $comment->author) }}">
                    <img class="avatar-img rounded-circle"
                         src="{{ $comment->author->avatar }}" alt="{{ $comment->author->name }}">
                </a>
            </div>

            <div class="w-100">
                <div class="mb-2 d-flex flex-column flex-md-row">
                    <h6 class="m-0 me-2">{{ $comment->author->name }}</h6>

                    <div class="me-3 small opacity-50">
                        <a href="#comment-{{ $comment->getKey() }}"
                           class="link-body-emphasis text-decoration-none">
                            <time
                                datetime="{{ now()->toISOString() }}">{{ $comment->created_at->diffForHumans() }}</time>
                        </a>

                        @can('update', $comment)
                            ·
                            <a href="{{ route('comments.show.edit', $comment) }}" data-turbo-method="post"
                               class="link-body-emphasis text-decoration-none">Редактировать</a>
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

                @isset($content)
                    {!! $content !!}
                @endif

                <div class="d-flex align-items-center">

                    <x-like :model="$comment"/>

                    @can('reply', $comment)
                        <a href="{{ route('comments.show.reply', $comment) }}" class="btn btn-link link-body-emphasis btn-sm"
                           data-turbo-method="post">Ответить</a>
                    @endcan
                </div>


                @isset($reply)
                    {!! $reply !!}
                @endif
            </div>
        </div>
    @endif
</div>
