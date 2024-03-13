@foreach($popular as $post)
    <div class="mb-3">
        <a href="{{ route('post.show', $post) }}" class="nav-link p-0 link-body-emphasis align-items-baseline">
            <span class="me-2">{{ $post->title }}</span>

            <small class="d-inline-flex align-items-center opacity-50">
                <x-icon path="i.comment"/>
                <span class="ms-2">{{ $post->comments_count }}</span>
            </small>
        </a>
    </div>
@endforeach
