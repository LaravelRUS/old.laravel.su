<turbo-frame id="latest-positions">
    <div class="row">
        @forelse($positions as $position)
            <div class="col-4 position-relative" id="@domid($position)">
                <div
                    class="bg-body-secondary p-4 rounded">

                        <div class="d-flex align-items-center    d-md-block">
                            <span class="badge bg-secondary rounded-pill">{{$position->schedule->text()}}</span>

                        </div>

                        <div class="mt-2">

                            <a href="{{route('position.show', $position)}}"
                               class="h5 link-body-emphasis stretched-link text-decoration-none">{{$position->title}}</a>

                        </div>

                        <div class="d-flex flex-column gap-2  mt-3">
                            <span class="opacity-50 d-flex align-items-center">
                                <x-icon path="bs.geo-alt-fill" class="me-2"/>
                                {{$position->location}}
                            </span>
                        </div>
                        <div class="d-flex fw-medium mt-3 h5">

                                @if (!is_null($position->salary_min) && !is_null($position->salary_max))
                                    {{ $position->salary_min }} - {{ $position->salary_max }} ₽
                                @elseif (!is_null($position->salary_min))
                                    от {{ $position->salary_min }} ₽
                                @elseif (!is_null($position->salary_max))
                                    до {{ $position->salary_max }} ₽
                                @endif

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
