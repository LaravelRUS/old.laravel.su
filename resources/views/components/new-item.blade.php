@if(auth()->user()?->id === $user->id)
    <div {{ $attributes->merge(['class' => 'bg-body-tertiary rounded overflow-hidden my-5 px-4 px-md-5 py-4 position-relative'])->except(['user', 'link']) }}>
        <div class="row align-items-center">
            <div class="col-auto col">
                <div class="avatar avatar-sm">
                    <img class="avatar-img rounded-circle"
                         src="{{ $user->avatar }}"
                         alt="{{ $user->title }}">
                </div>
            </div>

            <div class="col mx-auto d-none d-md-block">
                <p class="opacity-50 mb-0">Новая запись</p>
            </div>

            <div class="col-xxl-auto col-8 col-sm-6 ms-auto text-end">
                <a href="{{ $link }}" class="btn btn-outline-primary stretched-link">Новая запись</a>
            </div>
        </div>
    </div>
@endif
