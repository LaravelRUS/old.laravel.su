<x-stream target="popular" class="flex-column col-xxl-10" action="append">

    @foreach($popular as $post)
        <div class=" mb-3">
            <a href="{{ route('post.show', $post) }}" class="nav-link p-0 link-body-emphasis align-items-baseline">
                <span class="me-2">{{ $post->title }}</span>

                <small class="d-inline-flex align-items-center opacity-50">
                    <x-icon path="bs.chat"/>
                    <span class="ms-2">{{ $post->comments_count }}</span>
                </small>
            </a>
        </div>
    @endforeach
</x-stream>
<x-stream target="feed-more" target="replase">
    @if($popular->hasMorePages())
        <a href="{{ $popular->nextPageUrl()}}"
           data-turbo-method="post"
           class="link-body-emphasis text-decoration-none fw-bolder">Показать ещё</a>
    @endif
</x-stream>
