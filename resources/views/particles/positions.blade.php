@if($positions->isEmpty())

    <div class="col-12">
        <div class="bg-body-tertiary rounded shadow p-4 align-items-center justify-content-between
            position-relative">

            <div class="text-center">
                Здесь еще нет публикаций
            </div>

        </div>
    </div>

@else

    @foreach($positions as $position)
        <div class="col-12 position-relative" id="@domid($position)">
            <div class="row bg-body-tertiary shadow rounded p-4 d-md-flex align-items-center justify-content-between position-relative">

                <div class="d-flex align-items-center col-md-2">
                    <div class="avatar avatar-xl">
                        <img
                            src="https://play-lh.googleusercontent.com/ADApjX-HvYOpnB4jqpe7UwzTL_sVs5_c8mv0H1ph4b1RYEu7qeXOpQuKdHmWBomv_2I"
                            class="avatar-img rounded-3 shadow bg-white" alt="">
                    </div>


                </div>
                <div class="col-md-3 mt-2 mt-md-0">

                    <a href="{{route('position.show', $position)}}"
                       class="h5 link-body-emphasis text-decoration-none">{{$position->title}}</a>
                    <div class="text-muted mt-md-2"> {{$position->organization}}</div>

                </div>

                <div class="d-flex align-items-center justify-content-between   d-md-block mt-3 mt-md-0 col-md-3">
                    <span class="badge bg-primary rounded-pill">{{$position->schedule->text()}}</span>
                    <span class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                <x-icon path="bs.clock" class="me-2"/>
                                {{ $position->created_at->diffForHumans() }}
                            </span>
                </div>

                <div class="d-flex align-items-center justify-content-between  d-md-block mt-2 mt-md-0 col-md-2">
                            <span class="text-muted d-flex align-items-center">
                                <x-icon path="bs.geo-alt-fill" class="me-2"/>
                                {{$position->address}}
                            </span>
                    <span class="d-flex fw-medium mt-md-2">
                        @if (!is_null($position->salary_min) && !is_null($position->salary_max))
                            {{ $position->salary_min }} - {{ $position->salary_max }} ₽
                        @elseif (!is_null($position->salary_min))
                                                        от {{ $position->salary_min }} ₽
                        @elseif (!is_null($position->salary_max))
                                                        до {{ $position->salary_max }} ₽
                        @endif
                    </span>
                </div>

                <div class="col-md-2 mt-3 mt-md-0 text-center text-md-end">
                    <a href="{{route('position.show', $position)}}" class="btn stretched-link btn-primary w-full ms-md-1">Посмотреть</a>
                </div>

            </div>
        </div>
    @endforeach

@endif
