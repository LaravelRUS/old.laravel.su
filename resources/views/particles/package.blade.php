<div id="@domid($package)" class="col">
    <div class="d-flex flex-column justify-content-between bg-body-tertiary p-4 p-xl-5 rounded h-100 text-wrap text-break  position-relative">

        <div class="d-flex align-items-center justify-content-between mb-2 text-balance">
        <span class="badge text-white"
              style="background-color: {{$package->type->colorText()}}; text-shadow: 0px 0px 1em black;">
            {{ $package->type->text() }}
        </span>
            @if(is_active('profile.packages'))
                <div class="dropdown position-relative z-3">
                    <a href="#" class="text-secondary btn btn-link py-1 px-2" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <x-icon path="bs.three-dots"/>
                    </a>
                    <ul class="dropdown-menu">
                        @can('isOwner', $package)
                            <li>
                                <a class="dropdown-item"
                                   href="{{route('packages.edit', $package)}}">Редактировать</a>
                            </li>

                            <li>
                                <a class="dropdown-item" data-turbo-method="delete"
                                   data-turbo-confirm="Вы уверены, что хотите удалить статью?"
                                   href="{{route('packages.delete', $package)}}">Удалить</a>
                            </li>
                        @endcan
                        <li>
                            <button class="dropdown-item"
                                    data-controller="share"
                                    data-share-title-value="{{$package->name}}"
                                    data-share-url-value="{{ $package->website }}"
                                    data-action="click->share#dialog"
                            >Поделиться
                            </button>
                        </li>
                    </ul>
                </div>
            @endif
        </div>

        <p class="fs-4 fw-bolder mb-2">
            {{ $package->name }}
        </p>

        <hr class="w-25">

        <p class="line-clamp o-50 line-clamp-5 small">
            {{ $package->description }}
        </p>


        <div class="row justify-content-between">
            <div class="col-auto d-inline-flex align-items-center me-auto">
                <x-icon path="bs.star-fill" class="me-2 text-warning"/>
                {{ $package->stars }}
            </div>
            <div class="col">
                <p class="text-end mb-0">
                    <a href="{{ $package->website }}"
                       class="link-body-emphasis stretched-link icon-link icon-link-hover text-decoration-none">Перейти
                        <x-icon path="bs.arrow-right"/>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
