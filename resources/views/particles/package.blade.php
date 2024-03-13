<div id="@domid($package)" class="col">
    <div class="d-flex flex-column justify-content-between bg-body-tertiary p-4 p-xl-5 rounded h-100 text-wrap text-break  position-relative">

        <div class="d-flex align-items-center justify-content-between mb-2 text-balance">
        <span class="badge text-white"
              style="background-color: {{$package->type->colorText()}}; text-shadow: 0px 0px 0.5em #161822;">
            {{ $package->type->text() }}
        </span>
            @if(is_active('profile.packages'))
                <div class="position-relative z-3">
                    @can('update', $package)
                        <a class="btn btn-link link-secondary" href="{{route('packages.edit', $package)}}" title="Редактировать">
                            <x-icon path="i.edit"/>
                        </a>
                    @else

                        <x-device phone="true" tablet="true">
                            <button class="btn btn-link link-secondary"
                                    data-controller="share"
                                    data-share-title-value="{{$package->name}}"
                                    data-share-url-value="{{ $package->website }}"
                                    data-action="click->share#dialog"
                                    title="Поделиться"
                            >
                                <x-icon path="i.share"/>
                            </button>
                        </x-device>
                        <x-device desktop="true">
                            <button class="btn btn-link link-secondary clipboard" data-controller="clipboard"
                                    data-action="clipboard#copy"
                                    data-clipboard-done-class="done">
                                <span class="d-none" data-clipboard-target="source">{{ $package->website }}</span>
                                <x-icon path="i.copy" class="copy-action" data-controller="tooltip" title="Скопировать в буфер" />
                                <x-icon path="i.copy-fill" class="copy-done" data-controller="tooltip" title="Скопировано" />
                            </button>
                        </x-device>

                    @endcan
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
                <x-icon path="i.star-fill" class="me-2 text-warning"/>
                {{ $package->presenter()->stars() }}
            </div>
            <div class="col">
                <p class="text-end mb-0">
                    <a href="{{ $package->website }}"
                       class="link-body-emphasis stretched-link icon-link icon-link-hover text-decoration-none">Перейти
                        <x-icon path="i.arrow-right" class="bi"/>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
