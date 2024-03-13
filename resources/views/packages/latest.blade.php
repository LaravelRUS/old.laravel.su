<turbo-frame id="latest-positions">
    <div class="row">
        @forelse($packages as $package)
            <div id="@domid($package)" class="col-4">
                <div class="d-flex flex-column justify-content-between bg-body-secondary p-4 p-xl-5 rounded h-100 text-wrap text-break  position-relative">

                        <div class="d-flex align-items-center d-md-block">
                            <span class="badge text-white rounded-pill"
                                  style="background-color: {{$package->type->colorText()}}; text-shadow: 0px 0px 0.5em #161822;">
                                {{ $package->type->text() }}
                            </span>
                        </div>

                        <div class="mt-2 mb-auto">
                            <a href="{{ $package->website }}" class="h5 link-body-emphasis stretched-link text-decoration-none mb-2 d-block">
                                {{ $package->name }}
                            </a>

                            <p class="line-clamp opacity-50 line-clamp-4 small text-balance">
                                {{ $package->description }}
                            </p>
                        </div>

                    <div class="row justify-content-between mt-3">
                        <div class="col-auto d-inline-flex align-items-center me-auto">
                            <x-icon path="bs.star-fill" class="me-2 text-warning"/>
                            {{ $package->presenter()->stars() }}
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-12">
                <div class="bg-body-tertiary rounded p-4 p-md-5 align-items-center justify-content-between position-relative">
                    <div class="text-center">
                        Здесь еще нет публикаций
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</turbo-frame>
