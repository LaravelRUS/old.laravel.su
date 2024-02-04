<x-container>
    <div class="row g-md-5 py-lg-5 justify-content-center {{ $attributes->get('align', 'align-items-center') }}">
        <div class="col-lg-6">
            @isset($sup)
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">{{ $sup }}</span>
            @endisset

            <h1 class="display-5 fw-bold text-body-emphasis mb-4 text-balance">{!!  $title !!}</h1>

            @isset($description)
                <p class="lead mb-4 pe-xl-5">
                    {!!  $description !!}
                </p>
            @endisset

            @isset($actions)
                <div class="gap-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
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
