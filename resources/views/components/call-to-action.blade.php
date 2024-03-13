<x-container>
    <div class="p-4 p-xl-5 bg-body-secondary rounded-4 d-lg-flex align-items-center justify-content-between position-relative">
        <figure class="position-absolute top-0 start-0 translate-middle z-n1 ms-4">
            <x-icon path="l.cube" width="46" height="53" fill="none"/>
        </figure>


        <div class="col-lg-7">
            <p class="display-6 fw-bold text-balance">{!!  $title !!}</p>
            <p class="mb-lg-0 text-balance">
                {!!  $description !!}
            </p>
        </div>

        <a href="{{ $attributes->get('link', '#') }}" class="d-block d-md-inline-block btn btn-outline-primary btn-lg px-4">
            {{ $attributes->get('text', 'Перейти') }}
        </a>
    </div>
</x-container>
