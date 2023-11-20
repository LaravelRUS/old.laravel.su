@if($posts->isEmpty())
        <div class="bg-body-tertiary rounded p-5 rounded">
            <div class="p-5">
                @if ($isMyProfile)
                    <div class="text-center mb-3">
                        Напишите первую статью, чтобы привлечь читателей
                    </div>
                    <div class="text-center">
                        <a href="{{ route('post.edit') }}" class="btn btn-secondary">Создать запись</a>
                    </div>
                @else
                    <div class="text-center mb-3">
                        Здесь еще нет публикаций
                    </div>
                @endif
            </div>
        </div>
@else
    @foreach ($posts as $post)
        <div id="post_{{ $post->getKey() }}" class="bg-body-tertiary mb-4 px-5 py-4 rounded hotwire-frame">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm me-3">
                        <a href="{{route('profile', $post->author)}}">
                            <img class="avatar-img rounded-circle" src="{{ $post->author->avatar }}"
                                 alt="{{ $post->author->title }}">
                        </a>
                    </div>

                    <div class="small">
                        <h6 class="mb-0 me-4">
                            <a href="{{route('profile',$post->author)}}"
                               class="text-body-secondary text-decoration-none">{{ $post->author->name }}</a>
                        </h6>
                        <p class="mb-0 small">Разработчик laravel.su</p>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <x-icon path="bs.three-dots"/>
                    </a>
                    <ul class="dropdown-menu">
                        @can('isOwner', $post)
                            <li>
                                <a class="dropdown-item" href="{{route('post.edit', $post)}}">Редактировать</a>
                            </li>

                            <li>
                                <a class="dropdown-item" data-turbo-method="delete"
                                   data-turbo-confirm="Вы уверены, что хотите удалить статью?"
                                   href="{{route('post.delete', $post)}}">Удалить</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>

            <div class="position-relative post">
                <a href="{{ route('post.show', $post) }}"
                   class="position-absolute start-0 end-0 top-0 bottom-0"></a>

                <h4 class="mb-3">{{ $post->title }}</h4>

                <div class="line-clamp line-clamp-5">{!!  \Illuminate\Support\Str::of($post->content)->markdown() !!}</div>
            </div>

            <div class="d-flex align-items-center mt-4">

                <x-like :model="$post"/>

                <a class="d-flex align-items-center text-body-secondary text-decoration-none me-4"
                   href="{{ route('post.show', $post) }}">
                    <x-icon path="bs.chat"/>
                    <span class="ms-2">{{ $post->comments_count }}</span>
                </a>

                <span class="d-flex align-items-center text-body-secondary text-decoration-none">
                    <x-icon path="bs.clock"/>
                    <span class="ms-2">{{ $post->estimatedReadingTime() }} мин</span>
                </span>

                <span class="text-body-secondary ms-auto user-select-none small">{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
    @endforeach
@endif
