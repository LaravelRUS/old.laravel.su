<x-container>
    <div class="row g-4 g-md-5 py-lg-5 justify-content-center {{ $attributes->get('align', 'align-items-center') }}">
        <div class="col-lg-6">
            @isset($sup)
                <span class="text-primary mb-3 d-block text-uppercase text-center text-lg-start fw-semibold ls-xl">{{ $sup }}</span>
            @endisset

            <h1 class="display-5 fw-bold text-body-emphasis mb-4 text-balance text-center text-lg-start">{!!  $title !!}</h1>

            @isset($description)
                <p class="lead mb-4 pe-xl-5 text-center text-lg-start">
                    {!!  $description !!}
                </p>
            @endisset

            @isset($actions)
                <div class="d-grid gap-3 d-md-flex justify-content-center justify-content-lg-start align-items-baseline">
                    {!! $actions !!}
                </div>
            @endisset
        </div>
        <div class="col-12 col-sm-8 col-lg-6">
            @isset($content)
                {!! $content !!}
            @else
                <img src="{{ $attributes->get('image', '/img/sign.svg') }}" alt="{{ strip_tags($title) }}"
                     class="d-none d-sm-block mx-lg-auto img-fluid pe-none" width="700" height="500" loading="lazy">
            @endisset
        </div>
    </div>
</x-container>
