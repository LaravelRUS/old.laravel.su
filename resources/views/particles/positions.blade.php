<x-container>
    <div class="row">
        <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1 d-none d-lg-block">
            <h4 class="mb-4">Вакансии</h4>
            <turbo-frame id="latest-positions" src="{{route('positions.latest')}}" loading="lazy" target="_top">
                <div class="row">
                    @foreach(range(0,2) as $placeholder)
                        <div class="col-4 position-relative">
                            <div class="bg-body-secondary p-4 rounded w-100">
                                <p class="card-text placeholder-glow mb-2">
                                    <span class="placeholder rounded col-4"></span>
                                    <span class="placeholder rounded col-12"></span>
                                    <span class="placeholder rounded col-5"></span>
                                    <span class="placeholder rounded col-9"></span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </turbo-frame>
        </div>
    </div>
</x-container>
