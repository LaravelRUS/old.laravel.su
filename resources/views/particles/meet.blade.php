<div id="@domid($meet)" class="bg-body-tertiary p-5 rounded-5 shadow mb-5 hotwire-frame">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="d-flex flex-column align-items-start">
            <span class="opacity-50">{{$meet->start_date}}</span>
            <small class="opacity-50">{{$meet->address}}</small>
        </div>
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
    </div>

    <h5 class="my-3">{{$meet->name}}</h5>
    <div class="line-clamp line-clamp-5">
        {!!  \Illuminate\Support\Str::of($meet->description)->markdown() !!}
    </div>

    <a href="#" class="btn btn-outline-primary">Как это было</a>

</div>
