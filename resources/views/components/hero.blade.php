<div {{ $attributes->merge(['class' => 'position-relative overflow-hidden h-100']) }}>
    <img src="{{$image}}" class="w-100 h-100 object-fit-cover">

    <div
        class="position-absolute hero-image top-0 bottom-0 start-0 end-0 text-white p-5 d-flex align-items-end">
        @if(!empty($text))
            <div>
                <small class="d-block opacity-50 small mb-1">Ваш учитель:</small>
                <p class="fs-4 lh-1 text-balance mb-0">{{ $text }}</p>
            </div>
        @endif
    </div>
</div>
