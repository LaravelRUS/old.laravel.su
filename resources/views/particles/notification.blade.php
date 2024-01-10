<div id="@domid($notification)"
     class="d-flex flex-column justify-content-between p-4 p-lg-5 rounded mb-4 hotwire-frame
     @if($notification->read())
     bg-secondary bg-opacity-10 text-muted
     @else
     bg-body-tertiary
     @endif
     ">
    <div>
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">   {{ $notification->data['title'] }}</h5>
            @if($notification->unread())
                <div class="dropdown">
                    <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <x-icon path="bs.three-dots"/>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{route('profile.notifications.read', $notification)}}">Отметить
                                прочитанным</a>
                        </li>

                    </ul>
                </div>
            @endif
        </div>

        @isset($notification->data['useClipboard'])
            <div class="d-flex align-items-center my-3 ">

                <span class="mb-0">{{ $notification->data['clipboardData'] }}</span>
                <button class="btn btn-secondary clipboard ms-2" data-controller="clipboard"
                        data-action="clipboard#copy"
                        data-clipboard-done-class="done">
                    <span class="d-none"
                          data-clipboard-target="source">{{ $notification->data['clipboardData'] }}</span>
                    <x-icon path="bs.clipboard" class="copy-action" data-controller="tooltip"
                            title="Скопировать в буфер"/>
                    <x-icon path="bs.check2" class="copy-done" data-controller="tooltip" title="Скопировано"/>
                </button>

            </div>
        @endif

    </div>


    @if(isset($notification->data['downloadAttribute']))
        <div class="row">
            <div class="col-12 col-sm-4 col-xl-3 mt-3 mt-sm-0">
                <div class="d-grid">
                    <a class="btn btn-outline-primary" href="{{$notification->data['action'] }}"
                       @isset($notification->data['downloadAttributeValue'])
                           download="{{$notification->data['downloadAttributeValue']}}"
                       @else
                           download
                        @endif
                    >Скачать</a>
                </div>
            </div>
        </div>
    @elseif(isset($notification->data['action']))
        <div class="row">
            <div class="col-12 col-sm-4 col-xl-3 mt-3 mt-sm-0">
                <div class="d-grid">
                    <a class="btn btn-outline-primary" href="{{ $notification->data['action'] }}" target="_blank"
                       rel="noopener">Перейти</a>
                </div>
            </div>
        </div>
    @endif
</div>
