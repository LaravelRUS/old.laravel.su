@if( $positions->nextCursor())
    <turbo-frame
        id="positions-more"
        loading="lazy"
        target="_top"
        src="{{ route('positions', request()->collect()->merge(['cursor' => $positions->nextCursor()->encode()])->all()) }}">
    </turbo-frame>

    @foreach(range(0,2) as $placeholder)
        <div class="col-12 position-placeholder">
            <div class="row bg-body-tertiary rounded p-4 d-md-flex align-items-center justify-content-between">

                <div class="d-flex align-items-center col-md-2">
                    <span class="placeholder rounded w-100"></span>
                </div>

                <div class="col-md-3 mt-2 mt-md-0">
                    <span class="placeholder rounded w-100"></span>
                    <span class="placeholder rounded w-100"></span>
                </div>

                <div class="d-flex align-items-center justify-content-between   d-md-block mt-3 mt-md-0 col-md-3">
                    <span class="placeholder rounded w-100"></span>
                    <span class="placeholder rounded w-100"></span>
                </div>

                <div class="d-flex align-items-center justify-content-between  d-md-block mt-2 mt-md-0 col-md-2">
                    <span class="placeholder rounded w-100"></span>
                    <span class="placeholder rounded w-100"></span>
                </div>

                <div class="col-md-2 mt-3 mt-md-0 text-center text-md-end">
                    <span class="placeholder rounded w-100"></span>
                </div>
            </div>
        </div>
    @endforeach
@endif
