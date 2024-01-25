<turbo-frame id="latest-positions">
    <div class="row">
        @forelse($packages as $package)
            <div id="@domid($package)" class="col-4">
                <div class="d-flex flex-column justify-content-between bg-body-secondary p-4 p-xl-5 rounded h-100 text-wrap text-break  position-relative">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2 text-balance">
                            <span class="badge text-white"
                                  style="background-color: {{$package->type->colorText()}}; text-shadow: 0px 0px 1em black;">
                                {{ $package->type->text() }}
                            </span>
                        </div>

                        <p class="fs-4 fw-bolder mb-2">
                            {{ $package->name }}
                        </p>


                        <p class="line-clamp o-50 line-clamp-5 small">
                            {{ $package->description }}
                        </p>
                    </div>


                    <div class="row justify-content-between">
                        <div class="col-auto d-inline-flex align-items-center me-auto">
                            <x-icon path="bs.star-fill" class="me-2 text-warning"/>
                            {{ $package->stars }}
                        </div>
                        <div class="col">
                            <p class="text-end mb-0">
                                <a href="{{ $package->website }}"
                                   class="stretched-link">
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-12">
                <div class="bg-body-tertiary rounded p-4 p-md-5 align-items-center justify-content-between
            position-relative">

                    <div class="text-center">
                        Здесь еще нет публикаций
                    </div>

                </div>
            </div>
        @endforelse
    </div>
</turbo-frame>
