<x-container>
    @foreach($sections as $key => $section)
        <div class="row g-5 justify-content-center align-items-start position-relative mb-5" id="{{ $section->slug() }}">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        {{ $key }}
                    </div>
                </div>
                <h5 class="fs-4 mt-2 fw-semibold">
                    <a href="#{{ $section->slug() }}" class="link-body-emphasis text-decoration-none">{{ $section->title() }}</a>
                </h5>
                <p class="mb-0">
                    {{ $section->description() }}
                </p>
            </div>
            <div class="col-xl-8 position-sticky top-0">
                <main class="bg-body-tertiary p-xl-5 p-4 rounded shadow">
                    <x-docs.content :content="$section->content()" />
                </main>
            </div>
        </div>
    @endforeach
</x-container>
