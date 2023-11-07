<turbo-frame id="tabs-frame" target="_top">

        <div class="col-xl-8 col-md-12 mx-auto mt-5 mb-3">
            <div class="bg-body-tertiary  overflow-hidden px-5 py-3">
                <div class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'posts') active @endif"
                           href="{{route('profile.posts',$user)}}"
                           data-turbo-frame="tabs-frame"
                        >Статьи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'comments') active @endif"
                           href="{{route('profile.comments',$user)}}"
                           data-turbo-frame="tabs-frame"
                        >Комментариии</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'achievements') achievements @endif" href="#" >Награды</a>
                    </li>
                </div>
            </div>
        </div>

    <div>
        @yield('tab')
    </div>
</turbo-frame>
