@extends('layout')

@section('title', 'Перенаправление')

@section('content')

    <x-container>
        <div class="col-xl-6 col-lg-8  col-md-12 mx-auto">
            <div class="bg-body-tertiary p-5 rounded">
                <div class="mb-4 text-center">
                    <h1 class="position-relative fw-bold mb-4">
                        Перенаправление
                        <span data-controller="loading-dots" class="position-absolute"></span>
                    </h1>
                </div>

                <div class="p-4 bg-body-secondary rounded position-relative" id="redirect-description"
                     data-turbo-temporary>

                    <p class="mb-0">
                        Через несколько секунд вы будете перенаправлены на внешнюю страницу.
                        Если перенаправление не произошло автоматически, нажмите
                        <a class="fw-semibold text-decoration-none text-primary" href="{{$link}}">здесь</a>.
                    </p>

                </div>

                <div class="text-center my-4">
                    <a class="fw-semibold text-decoration-none text-primary"
                       href="{{ route('home') }}" data-turbo-action="replace">На главную</a>
                </div>
            </div>
        </div>
    </x-container>


    <script>
        Turbo.cache.exemptPageFromCache();

        let newRedirectLocation = "{!! $link !!}";
        let hyperlink = document.querySelector("#redirect-description a");

        if (window.location.hostname !== (new URL(newRedirectLocation)).hostname) {
            document.getElementById('redirect-description').setAttribute('data-turbo', 'false');
            Turbo.cache.clear();
            hyperlink.setAttribute("target", "_blank");
        }

        /**
         * Basic
         */
        try {
            hyperlink.click()
            //window.open(newRedirectLocation, hyperlink.getAttribute("target") || '_self')
        } catch (e) {
            setTimeout(() => {
                alert('Your device settings do not allow you to switch automatically. Please click the link manually.')
            }, 2000)
        }
    </script>

@endsection
