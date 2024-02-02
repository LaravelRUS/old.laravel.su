<div class="bg-body rounded overflow-hidden p-4 p-xxl-5 mb-4 position-relative">
    <div class="col-xxl-10 d-flex flex-column position-static small">
        <a href="{{ $link }}"
           class="link-body-emphasis text-decoration-none stretched-link ">
            <p class="h5 my-0 text-balance fw-bolder  line-clamp line-clamp-2">{{ $title }}</p>
        </a>
        <div class="mb-2 opacity-50">{{ $link }}</div>

        <p class="card-text mb-0 text-balance line-clamp line-clamp-2">{{ $description }}</p>
    </div>

    @if($image)
        <div class="ratio-16x9 mt-3">
            <img src="{{ $image }}" class="img-fluid rounded-end-0 mb-0" style="min-height: auto;">
        </div>
    @endif
</div>
