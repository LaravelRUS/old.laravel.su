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
               class="link-body-emphasis text-decoration-none">
                {{ $user->name }}

                @if(!is_null($user->selected_achievement))
                    <span class="text-primary small">( {{ $user->selected_achievement->name() }} )</span>
                @endif
            </a>
        </h6>
        <p class="mb-0 small line-clamp line-clamp-1 opacity-75">{{ $user->about ?? $user->github_bio ?? 'Скрытый лист' }}</p>
    </div>
</div>
