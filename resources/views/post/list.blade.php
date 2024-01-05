@forelse ($posts as $post)
    <div id="@domid($post)" class="bg-body-tertiary mb-4 p-xxl-5 p-4 rounded hotwire-frame">
        <div class="d-flex align-items-center justify-content-between mb-3">

            <x-profile :user="$post->author"/>

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
        </div>

        <div class="position-relative post overflow-hidden">
            <a href="{{ route('post.show', $post) }}"
               class="position-absolute start-0 end-0 top-0 bottom-0 z-2"></a>

            <h4 class="mb-3 mt-2">{{ $post->title }}</h4>

            <div class="line-clamp line-clamp-5 post-preview-text" data-controller="prism">
                {!! \Illuminate\Support\Str::of($post->content)->markdown(['html_input' => 'strip']) !!}
            </div>

            <div class="to-transparent"></div>
        </div>

        <div class="d-flex align-items-center mt-4">

            <x-like :model="$post"/>

            <a class="d-flex align-items-center text-body-secondary text-decoration-none me-4"
               href="{{ route('post.show', $post) }}">
                <x-icon path="bs.chat"/>
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
    <div class="bg-body-tertiary rounded p-5 rounded">
        <div class="p-md-5">
            @if (isset($user) && $user?->id === Auth::user()?->id)
                <div class="text-center mb-3">
                    Напишите первую статью, чтобы привлечь читателей
                </div>
                <div class="text-center">
                    <a href="{{ route('post.create') }}" class="btn btn-secondary">Создать запись</a>
                </div>
            @else
                <div class="text-center mb-3">
                    Здесь еще нет публикаций
                </div>
            @endif
        </div>
    </div>
@endforelse
