<nav
    class="navbar position-fixed fixed-bottom border-top border-primary-subtle p-0 d-block d-xxl-none overflow-hidden min-vw-100 vw-100 border-end-0 bg-dark-subtle text-white"
    data-bs-theme="dark">
    <div class="d-flex align-items-center g-0 vw-100 px-2 py-2">
        <div class="col text-center position-relative">
            <a href="{{ route('feed') }}" data-turbo-action="replace" class="d-block nav-link link-body-emphasis">
                <x-icon path="bs.house" width="1.5em" height="1.5em"/>
            </a>
        </div>

        <div class="col text-center position-relative">
            <a href="{{ route('feed') }}" data-turbo-action="replace" class="d-block nav-link link-body-emphasis">
                <x-icon path="bs.house" width="1.5em" height="1.5em"/>
            </a>
        </div>

        <div class="col text-center position-relative">
            <a href="{{ route('feed') }}" data-turbo-action="replace" class="d-block nav-link link-body-emphasis">
                <x-icon path="bs.house" width="1.5em" height="1.5em"/>
            </a>
        </div>

        @auth
            <div class="col text-center">
                <a href="{{ route('profile', auth()->user()) }}" data-turbo-action="replace"
                   class="d-block text-muted avatar">
                    <img src="https://avatars.githubusercontent.com/u/5102591?v=4" class="avatar-img rounded-circle"
                         width="32">
                </a>
            </div>
        @endauth
    </div>
</nav>
