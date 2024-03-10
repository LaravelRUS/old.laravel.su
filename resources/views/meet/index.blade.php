@extends('layout')
@section('title', 'Встречи')

@section('content')


    @if($past->currentPage() === 1)
        <x-header>
            <x-slot:sup>Нельзя пропустить</x-slot>
            <x-slot:title>Не обойдется без Laravel</x-slot>
            <x-slot:description>
                Ни одна PHP встреча не обходится без упоминания Laravel.
                Это самый популярный фреймворк в мире PHP.
            </x-slot>

            @if($most)
                <x-slot:content>
                    <div class="position-relative">
                    <div class="bg-body-secondary dashed p-4 rounded position-relative">
                        <a href="{{ $most->link }}" class="position-absolute start-0 end-0 top-0 bottom-0 z-1"></a>

                        <div class="row g-4 justify-content-between align-items-center">
                            <div class="col-sm-7">
                                <div class="row g-3">

                                    <div class="col-12">
                                        <h4 class="mb-0">{{ $most->name }}</h4>
                                    </div>

                                    <!-- Date -->
                                    <div class="col-6">
                                        <small class="text-muted">Дата</small>
                                        <h6>{{ $most->start_date->isoFormat('DD MMMM', 'Do MMMM') }}</h6>
                                    </div>
                                    <!-- Time -->
                                    <div class="col-6">
                                        <small class="text-muted">Время</small>
                                        <h6>Начало в {{ $most->start_date->isoFormat('HH:mm', 'Do MMMM') }}</h6>
                                    </div>
                                    <!-- location -->
                                    <div class="col-12">
                                        <small class="text-muted">Адрес</small>
                                        <h6>{{ $most->location }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center">
                                <div class="ticket-border ">
                                    <!-- QR code -->
                                    <img class="img-fluid d-block mx-auto user-select-none rounded" src="https://chart.googleapis.com/chart?cht=qr&chl={{ urlencode($most->link) }}&chs=500x500" alt="">
                                </div>
                            </div>
                        </div>
                    </div>


                        <div class="position-absolute bottom-0 end-0 text-primary d-none d-lg-block ms-xl-n5 mb-lg-5 mb-xl-n5 pb-3">
                            <div class="ms-xl-n4">
                                <svg width="95" height="100" viewBox="0 0 95 100" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M78.8361 25.0939C91.1514 40.6379 81.8802 63.3086 61.7212 64.3539C60.7119 64.447 59.5832 64.3477 58.6105 64.2848C58.7669 50.9978 52.4534 36.5276 41.6324 32.847C31.8669 29.5776 26.5235 39.0204 30.5663 47.0383C35.4083 56.5589 43.9198 64.4699 54.2628 67.3808C53.4517 75.7446 49.4008 83.1867 40.4191 85.693C25.2817 89.8859 9.48935 75.832 7.25928 61.4938C7.12064 59.981 4.79 60.0942 4.92864 61.607C5.83171 80.8987 28.9103 96.1621 46.7792 87.3441C53.6867 83.8595 57.3887 76.5003 58.3558 68.173C69.2212 69.5612 79.5859 63.2659 85.1681 54.2081C91.5844 43.7002 88.5763 31.9764 81.257 23.1926C80.1091 21.7727 77.8441 23.7109 78.8361 25.0939ZM39.1221 52.6568C36.2753 49.3596 33.1435 45.1733 32.7276 40.635C32.275 36.2527 38.2211 36.1619 40.7539 36.5897C43.9108 37.163 46.2067 40.0025 47.9151 42.5401C51.7632 47.8805 54.3289 55.8821 54.5172 63.4926C48.5423 61.6026 43.3094 57.2542 39.1221 52.6568Z" fill="currentColor"></path><path d="M75.1096 15.0312C74.0848 19.3973 73.3354 23.9923 73.4392 28.4577C73.5047 30.2821 76.0279 30.0497 76.1186 28.2613C76.2997 24.6849 77.2976 21.1349 78.2588 17.7408C80.2501 18.3708 82.3978 19.0372 84.3528 19.8231C85.8397 20.4997 87.9238 22.1382 89.7035 21.5672C90.5937 21.2818 90.7767 20.5022 90.6474 19.6495C90.3065 17.596 87.0302 16.8302 85.3872 16.1172C82.6885 14.993 80.073 14.2174 77.2645 13.561C76.3289 13.3423 75.3292 14.0956 75.1096 15.0312Z" fill="currentColor"></path></svg>
                            </div>
                        </div>
                    </div>
                </x-slot:content>
            @endif
        </x-header>

        <x-container>
            <div class="row row-cols-1 row-cols-lg-3 g-4 position-relative">
                @foreach($actual as $meet)
                    <div class="col position-relative">
                        @if($loop->first)
                            <figure class="position-absolute top-0 start-0 translate-middle z-n1 ms-4">
                                <x-icon path="l.cube" width="46" height="53" fill="none"/>
                            </figure>
                        @endif
                        @include('particles.meet', ['meet' => $meet, 'loop' => $loop])
                    </div>
                @endforeach

                @if($actual->count() % 3 !== 0)
                    <x-icon path="l.dots" class="d-none d-lg-block text-primary opacity-2 opacity-25 col" height="400" width="100%" />

                    @if($actual->count() % 4 === 0)
                        <x-icon path="l.dots" class="d-none d-lg-block text-primary opacity-2 opacity-25 col" height="400" width="100%" />
                    @endif
                @endif
            </div>
        </x-container>


        <x-call-to-action link="{{ route('meets.create') }}" text="Опубликовать мероприятие">
            <x-slot:title>Устраиваете встречу?</x-slot>

            <x-slot:description>
                Просто заполните форму с деталями: название, дата и время проведения, место, темы и другие подробности. Мы
                опубликуем информацию на странице конференций, чтобы все могли узнать о вашем мероприятии.
            </x-slot>

        </x-call-to-action>
    @endif

    <x-container>
        <div class="row g-4 justify-content-center align-items-start  position-relative mb-5">
            <div class="d-none d-xl-block col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        <x-icon path="i.previous_meetings"/>
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Прошедшие конференции</h5>
                <p class="mb-0">Чтобы вы не сожалели о пропущенных конференциях, мы оставили записи с этих событий.</p>
            </div>

            <div class="d-xl-none top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        <x-icon path="i.previous_meetings"/>
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Прошедшие конференции</h5>
                <p class="mb-0">Чтобы вы не сожалели о пропущенных конференциях, мы оставили записи с этих событий.</p>
            </div>
            <div class="col-xl-8">

                <div class="row row-cols-lg-2 g-4 mb-4">
                    @foreach($past as $meet)
                        <div class="col">
                            @include('particles.meet', ['meet' => $meet, 'loop' => $loop])
                        </div>
                    @endforeach
                </div>

                {!! $past->links() !!}
            </div>
        </div>
    </x-container>
@endsection
