@extends('html')

@section('body')

    <div class="p-5">
        <div class="d-flex align-items-center mb-4">
            <select class="form-select form-select-sm rounded-3" onchange="Turbo.visit(this.value);">
                @foreach (\App\Docs::SUPPORT_VERSIONS as $version)
                    <option value="{{ route('docs', ['version' => $version]) }}" @selected(active(route('nav.docs', ['version' => $version]).'*'))>
                        {{ $version }}
                    </option>
                @endforeach
            </select>
        </div>
        <ul class="list-unstyled">
            @foreach ($docs->getMenu() as $item)
                <li class="{{ $loop->last ? '' : 'mb-5' }}">
                    <h4 class="d-flex align-items-center rounded border-0 text-body-secondary p-0 w-100 text-start">
                        {{ $item['title'] }}
                    </h4>

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
                </li>
            @endforeach
        </ul>
    </div>

@endsection
