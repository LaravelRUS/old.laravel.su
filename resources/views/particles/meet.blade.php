<div id="@domid($meet)" class="bg-body-tertiary p-4 p-lg-5 rounded-5 shadow mb-4 hotwire-frame">

    <div class="d-flex align-items-center justify-content-between">
        <p class="mb-0 text-primary">{{ $meet->start_date->isoFormat('DD MMMM', 'Do MMMM') }}</p>
        @if(is_active('profile.meets'))
            <div class="dropdown">
            <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
               aria-expanded="false">
                <x-icon path="bs.three-dots"/>
            </a>
            <ul class="dropdown-menu">
                @can('isOwner', $meet)
                    <li>
                        <a class="dropdown-item" href="{{route('meets.edit', $meet)}}">Редактировать</a>
                    </li>

                    <li>
                        <a class="dropdown-item" data-turbo-method="delete"
                           data-turbo-confirm="Вы уверены, что хотите удалить статью?"
                           href="{{route('meets.delete', $meet)}}">Удалить</a>
                    </li>
                @endcan
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
            <small class="opacity-50">{{ $meet->address ?? 'Онлайн' }} в {{ $meet->start_date->isoFormat('hh:mm', 'Do MMMM') }}</small>
        </div>
    </div>

    <p>{{ $meet->description }}</p>

    <div class="row">
        <div class="col-12 col-sm-4 col-xl-3 mt-3 mt-sm-0">
            <div class="d-grid">
                <a class="btn btn-outline-danger" href="{{ $meet->link }}" target="_blank" rel="noopener">Подробнее</a>
            </div>
        </div>
    </div>
</div>
