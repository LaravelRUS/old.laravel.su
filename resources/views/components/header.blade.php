<div {{ $attributes->merge(['class' => 'container py-5']) }}>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ $attributes->get('image', '/img/sign.svg') }}" alt="{{ $title }}" class="d-block mx-lg-auto img-fluid pe-none" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            @isset($sup)
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">{{ $sup }}</span>
            @endisset

            <h1 class="display-5 fw-bold mb-4">{{ $title }}</h1>

            @isset($description)
                <p class="pe-5">
                    {{ $description }}
                </p>
            @endisset

            @isset($actions)
                <div class="d-grid gap-3 d-md-flex justify-content-md-start">
                    {!! $actions !!}
                </div>
            @endisset
        </div>
    </div>
</div>
