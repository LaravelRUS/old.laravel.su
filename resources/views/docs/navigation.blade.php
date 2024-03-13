@extends('html')

@section('body')

    <div class="p-5">
        <div class="d-flex align-items-center mb-4">
            <select class="form-select form-select-sm rounded-3" onchange="Turbo.visit(this.value);">
                <optgroup label="Версия">
                    @foreach (\App\Docs::SUPPORT_VERSIONS as $version)
                        <option
                            value="{{ route('docs', ['version' => $version]) }}"
                            @selected(active(route('docs', ['version' => $version]).'*'))>{{ $version }}</option>
                    @endforeach
                </optgroup>
            </select>
        </div>
        <ul class="list-unstyled">

            @foreach ($docs->getMenu() as $item)
                <li class="{{ $loop->last ? '' : 'mb-4' }}">
                    <button
                        class="btn btn-toggle d-flex align-items-center rounded border-0 collapsed fw-medium fs-4 text-body-secondary p-0 w-100 text-start"
                        data-bs-toggle="collapse"
                        data-bs-target="#{{ \Illuminate\Support\Str::slug($item['title']) }}-collapse"
                        aria-expanded="true">
                        {{ $item['title'] }}
                    </button>

                    <div class="collapse {{ active(collect($item['list'])->map(fn($link) => $link['href']), 'show') }} mt-2"
                         id="{{ \Illuminate\Support\Str::slug($item['title']) }}-collapse"
                         data-bs-parent="#docs-menu">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-2">
                            @foreach ($item['list'] as $link)
                                <li>
                                    <a href="{{ $link['href'] }}"
                                       class="{{ active(url($link['href']), 'active', 'link-body-emphasis') }} d-inline-flex text-decoration-none rounded p-2">
                                        {{ $link['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>

@endsection
