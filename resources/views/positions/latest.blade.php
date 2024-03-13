<turbo-frame id="latest-positions">
    <div class="row">
        @forelse($positions as $position)
            <div class="col-4 position-relative" id="@domid($position)">
                <div
                    class="bg-body-secondary p-4 rounded h-100 d-flex flex-column">
                        <div class="d-flex align-items-center    d-md-block">
                            <span class="badge bg-secondary rounded-pill">{{$position->schedule->text()}}</span>
                        </div>

                        <div class="mt-2 mb-auto">
                            <a href="{{route('position.show', $position)}}"
                               class="h5 link-body-emphasis stretched-link text-decoration-none">{{$position->title}}</a>
                        </div>

                    @if($position->location)
                        <div class="d-flex flex-column gap-2 mt-3 small">
                            <span class="opacity-50 d-flex align-items-center">
                                <x-icon path="i.geo" class="me-2"/>
                                {{$position->location}}
                            </span>
                        </div>
                    @endif
                        <div class="d-flex fw-medium mt-2">
                            {{ $position->presenter()->salary() }}
                        </div>

                </div>
            </div>

        @empty
            <div class="col-12">
                <div class="bg-body-tertiary rounded p-4 p-md-5 align-items-center justify-content-between
            position-relative">

                    <div class="text-center">
                        Нет доступных вакансий на данный момент.
                    </div>

                </div>
            </div>
        @endforelse
    </div>
</turbo-frame>
