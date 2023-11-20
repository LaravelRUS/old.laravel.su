@if( $posts->nextCursor())
    <turbo-frame
        id="post-more"
        loading="lazy"
        target="_top"
        src="{{ route('posts', request()->collect()->merge(['cursor' => $posts->nextCursor()->encode()])->all()) }}">
    </turbo-frame>
@endif
