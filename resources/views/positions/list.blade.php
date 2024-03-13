@forelse($positions as $position)
    <div class="col-12 position-relative" id="@domid($position)">
        <div
            class="bg-body-tertiary rounded p-4 p-xl-5 position-relative">
            <div class="row d-md-flex align-items-center justify-content-between position-relative">

                <div class="col-md-3 mt-2 mt-md-0">
                    <a href="{{route('position.show', $position)}}"
                       class="h5 link-body-emphasis text-decoration-none">{{$position->title}}</a>
                    <div class="opacity-50 mt-md-2"> {{$position->organization}}</div>
                </div>

                <div class="d-flex align-items-center justify-content-between   d-md-block mt-3 mt-md-0 col-md-3">
                    <span class="badge bg-secondary rounded-pill">{{$position->schedule->text()}}</span>

                    <time
                        data-controller="tooltip"
                        title="Опубликовано {{ $position->created_at->format('d.m.Y H:i') }}"
                        class="opacity-50 d-flex align-items-center mt-md-2"
                        datetime="{{ $position->created_at->toISOString() }}">{{ $position->created_at->diffForHumans() }}</time>
                </div>

                <div class="d-flex flex-column gap-2 col-md-3 mt-3 mt-md-0">

                    @if($position->location)
                        <span class="opacity-50 d-flex align-items-center">
                            <x-icon path="i.geo" class="me-2"/>
                            {{$position->location}}
                        </span>
                    @endif
                    <span class="d-flex fw-medium">
                        {{ $position->presenter()->salary() }}
                    </span>
                </div>

                <div class="col-md-2 mt-3 mt-md-0 text-center text-md-end">
                    <a href="{{route('position.show', $position)}}" class="d-block d-md-inline-block btn stretched-link btn-primary w-full ms-md-1">Посмотреть</a>
                </div>
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
