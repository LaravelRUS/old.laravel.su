<div id="@domid($meet)"
     class="d-flex flex-column h-100 justify-content-between bg-body-tertiary p-4 p-xl-5 rounded mb-4 hotwire-frame">
    <div>
        <div class="d-flex align-items-center justify-content-between">
            <p class="mb-0 text-primary">{{ $meet->start_date->isoFormat('DD MMMM', 'Do MMMM') }}</p>
            @if(is_active('profile.meets'))
                <div >
                    @can('update', $meet)
                        <a class="btn btn-link link-secondary" href="{{route('meets.edit', $meet)}}" title="Редактировать">
                            <x-icon path="i.edit"/>
                        </a>
                    @else

                        <x-device phone="true" tablet="true">
                            <button class="btn btn-link link-secondary"
                                    data-controller="share"
                                    data-share-title-value="{{$meet->name}}"
                                    data-share-url-value="{{ $meet->link }}"
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
                                <span class="d-none" data-clipboard-target="source">{{ $meet->link }}</span>
                                <x-icon path="i.copy" class="copy-action" data-controller="tooltip" title="Скопировать в буфер" />
                                <x-icon path="i.copy-fill" class="copy-done" data-controller="tooltip" title="Скопировано" />
                            </button>
                        </x-device>

                    @endcan
                </div>
            @endif
        </div>

        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">{{ $meet->name }}</h5>
                <small class="opacity-50">{{ $meet->location ?? 'Онлайн' }} в {{ $meet->start_date->isoFormat('HH:mm', 'Do MMMM') }}</small>
            </div>
        </div>

        <div class="line-clamp line-clamp-5 mb-3">{{ $meet->description }}</div>
    </div>


    <div class="row">
        <div class="col-12 col-sm-4 col-xl-3 mt-3 mt-sm-0">
            <div class="d-grid">
                <a class="btn btn-outline-primary" href="{{ $meet->link }}" target="_blank" rel="noopener">Подробнее</a>
            </div>
        </div>
    </div>
</div>
