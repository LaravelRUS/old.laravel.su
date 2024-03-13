@forelse ($posts as $post)
    <div id="@domid($post)" class="bg-body-tertiary mb-4 p-4 p-xl-5 rounded hotwire-frame">
        <div class="d-flex align-items-center justify-content-between mb-3">

            <x-profile :user="$post->author"/>
            <div>
                @can('update', $post)
                    <a class="btn btn-link link-secondary" href="{{route('post.edit', $post)}}" title="Редактировать">
                        <x-icon path="i.edit"/>
                    </a>
                 @else

                    <x-device phone="true" tablet="true">
                        <button class="btn btn-link link-secondary"
                                data-controller="share"
                                data-share-title-value="{{$post->title}}"
                                data-share-url-value="{{ route('post.show', $post) }}"
                                data-action="click->share#dialog"
                                title="Поделиться"
                        >
                            <x-icon path="i.share"/>
                        </button>
                    </x-device>
                    <x-device desktop="true">
                        <button class="btn btn-link link-secondary clipboard" data-controller="clipboard"
                                data-action="clipboard#copy"
                                data-clipboard-done-class="done">
                            <span class="d-none" data-clipboard-target="source">{{ route('post.show', $post) }}</span>
                            <x-icon path="i.copy" class="copy-action" data-controller="tooltip" title="Скопировать в буфер" />
                            <x-icon path="i.copy-fill" class="copy-done" data-controller="tooltip" title="Скопировано" />
                        </button>
                    </x-device>

                @endcan
            </div>

            {{--

            <div class="dropdown">
                <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <x-icon path="bs.three-dots"/>
                </a>
                <ul class="dropdown-menu">
                    @can('update', $post)
                        <li>
                            <a class="dropdown-item" href="{{route('post.edit', $post)}}">Редактировать</a>
                        </li>
                    @endcan

                    <li>
                        <button class="dropdown-item"
                                data-controller="share"
                                data-share-title-value="{{$post->title}}"
                                data-share-url-value="{{ route('post.show', $post) }}"
                                data-action="click->share#dialog"
                        >Поделиться
                        </button>
                    </li>
                </ul>
            </div>
        --}}
        </div>

        <div class="position-relative post overflow-hidden">
            <a href="{{ route('post.show', $post) }}"
               class="position-absolute start-0 end-0 top-0 bottom-0 z-2"></a>

            <h4 class="mb-3 mt-2">{{ $post->title }}</h4>

            <div class="post post-preview-text" data-controller="prism line-clamp">
                <x-posts.content :content="$post->content"/>
            </div>

            <div class="to-transparent"></div>
        </div>

        <div class="d-flex align-items-center mt-4">

            <x-like :model="$post"/>

            <a class="d-flex align-items-center text-body-secondary text-decoration-none me-4"
               href="{{ route('post.show', $post) }}">
                <x-icon path="i.comment"/>
                <span class="ms-2">{{ $post->comments_count }}</span>
            </a>

            <time
                data-controller="tooltip"
                title="Опубликовано {{ $post->created_at->format('d.m.Y H:i') }}"
                class="text-body-secondary ms-auto user-select-none small"
                datetime="{{ $post->created_at->toISOString() }}">{{ $post->created_at->diffForHumans() }}</time>
        </div>
    </div>
@empty
    <div class="bg-body-tertiary rounded p-md-5 rounded">
        <div class="p-4 p-md-5">
            @if (isset($user) && $user?->id === Auth::user()?->id)
                <div class="text-center mb-3">
                    Напишите первую статью, чтобы привлечь читателей
                </div>
                <div class="text-center">
                    <a href="{{ route('post.create') }}" class="btn btn-secondary">Создать запись</a>
                </div>
            @else
                <div class="text-center mb-0">
                    Здесь еще нет публикаций
                </div>
            @endif
        </div>
    </div>
@endforelse
