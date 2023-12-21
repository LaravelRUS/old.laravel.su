<div {{ $attributes->merge(['class' => 'd-flex align-items-center'])->except('user') }}>
    <div class="avatar avatar-sm me-3">
        <a href="{{route('profile', $user)}}">
            <img class="avatar-img rounded-circle" src="{{ $user->avatar }}"
                 alt="{{ $user->title }}">
        </a>
    </div>

    <div class="small">
        <h6 class="mb-0 me-4">
            <a href="{{route('profile',$user)}}"
               class="text-body-secondary text-decoration-none">{{ $user->name }}</a>
        </h6>
        <p class="mb-0 small">Разработчик laravel.su</p>
    </div>
</div>
