<div id="comment_{{ $comment->getKey() }}" class="comment mt-4">

    @if($comment->trashed())
        <div class="d-flex position-relative overflow-hidden align-items-center mb-xl-5 mb-3">
            <div class="avatar avatar-sm me-3">
                <img class="avatar-img rounded-circle"
                     src="/img/ui/avatar.png" alt="Комментарий был удалён">
            </div>

            <div class="w-100 opacity-50">
                <p class="mb-0">Сообщение было удалено за нарушение <a href="{{ route('rules') }}" class="link-body-emphasis">правил</a>.</p>
            </div>
        </div>
    @else
        <div class="d-flex position-relative overflow-hidden">
            <div class="avatar avatar-sm me-3">
                <a href="{{  route('profile', $comment->author) }}">
                    <img class="avatar-img rounded-circle"
                         loading="lazy"
                         src="{{ $comment->author->avatar }}" alt="{{ $comment->author->name }}">
                </a>
            </div>

            <div class="w-100">

                <div class="mb-3 mt-1">
                    <div class="d-flex justify-content-start">
                        <h6 class="m-0 me-2">{{ $comment->author->name }}</h6>
                        @if(!is_null($comment->author->milestone))
                            <span class="text-primary small">({{ $comment->author->milestone->name() }})</span>
                        @endif


                    </div>
                    <div class="small opacity-50">
                        <a
                            @if(is_active('profile.comments'))
                                href="{{route('post.show',$comment->post->slug)}}#comment_{{ $comment->getKey() }}"
                            @else
                                href="#comment_{{ $comment->getKey() }}"
                            @endif
                            class="link-body-emphasis text-decoration-none">
                            {{ '@'.$comment->author->nickname}} ·
                            <time
                                datetime="{{ now()->toISOString() }}">{{ $comment->created_at->diffForHumans() }}</time>

                        </a>
                    </div>
                </div>

                @isset($content)
                    {!! $content !!}
                @endif

                <div class="d-flex align-items-center">

                    <x-like :model="$comment"/>

                        @can('update', $comment)
                            <a href="{{ route('comments.show.edit', $comment) }}" data-turbo-method="post"
                               class="btn btn-link link-body-emphasis btn-sm">Редактировать</a>
                        @endcan

                        @can('delete', $comment)
                            · <a href="{{ route('comments.delete', $comment) }}"
                                 class="btn btn-link link-body-emphasis btn-sm"
                                 data-turbo-method="DELETE"
                                 data-turbo-confirm="Вы уверены, что хотите удалить комментарий?">
                                Удалить
                            </a>
                        @endcan


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
