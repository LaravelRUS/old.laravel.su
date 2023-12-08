@if( $positions->nextCursor())
    <turbo-frame
        id="positions-more"
        loading="lazy"
        target="_top"
        src="{{ route('positions', request()->collect()->merge(['cursor' => $positions->nextCursor()->encode()])->all()) }}">
    </turbo-frame>
@endif
