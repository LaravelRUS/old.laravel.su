<x-container>
    <div class="p-5 bg-body-secondary rounded-4 d-flex align-items-center justify-content-between position-relative">
        <figure class="position-absolute top-0 start-0 translate-middle z-n1 ms-4">
            <x-icon path="l.cube" width="46" height="53" fill="none"/>
        </figure>


        <div class="col-7">
            <p class="display-6 fw-bold">{!!  $title !!}</p>
            <p class="mb-0">
                {!!  $description !!}
            </p>
        </div>

        <a href="{{ $attributes->get('link', '#') }}" class="btn btn-outline-primary btn-lg px-4">
            {{ $attributes->get('text', 'Перейти') }}
        </a>
    </div>
</x-container>
