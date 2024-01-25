<div id="@domid($meet)"
     class="d-flex flex-column justify-content-between bg-body-tertiary p-4 p-xl-5 rounded mb-4 hotwire-frame
     @if(isset($loop) && ($loop->iteration <= (3*intdiv($loop->count,3))))
     h-100
     @endif
     ">
    <div >
        <div class="d-flex align-items-center justify-content-between">
            <p class="mb-0 text-primary">{{ $meet->start_date->isoFormat('DD MMMM', 'Do MMMM') }}</p>
            @if(is_active('profile.meets'))
                <div class="dropdown">
                <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <x-icon path="bs.three-dots"/>
                </a>
                <ul class="dropdown-menu">
                    @can('update', $meet)
                        <li>
                            <a class="dropdown-item" href="{{route('meets.edit', $meet)}}">Редактировать</a>
                        </li>
                    @endcan
                    {{--
                    @can('delete', $meet)
                        <li>
                            <a class="dropdown-item" data-turbo-method="delete"
                               data-turbo-confirm="Вы уверены, что хотите удалить мероприятие?"
                               href="{{route('meets.delete', $meet)}}">Удалить</a>
                        </li>
                    @endcan
                    --}}
                    <li>
                        <button class="dropdown-item"
                                data-controller="share"
                                data-share-title-value="{{$meet->title}}"
                                data-share-url-value="{{ $meet->link }}"
                                data-action="click->share#dialog"
                        >Поделиться
                        </button>
                    </li>
                </ul>
            </div>
            @endif
        </div>

        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">{{ $meet->name }}</h5>
                <small class="opacity-50">{{ $meet->location ?? 'Онлайн' }} в {{ $meet->start_date->isoFormat('hh:mm', 'Do MMMM') }}</small>
            </div>
        </div>

        <div class="line-clamp line-clamp-5">{{ $meet->description }}</div>
    </div>


    <div class="row">
        <div class="col-12 col-sm-4 col-xl-3 mt-3 mt-sm-0">
            <div class="d-grid">
                <a class="btn btn-outline-primary" href="{{ $meet->link }}" target="_blank" rel="noopener">Подробнее</a>
            </div>
        </div>
    </div>
</div>
