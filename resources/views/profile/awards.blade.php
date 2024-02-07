@extends('profile.base')

@section('tab')
    <div class="col-xl-8 col-md-12 mx-auto">
        <div class="bg-body-tertiary rounded p-md-5 rounded">

            <div class="p-4 p-md-5 border-bottom mb-5">
                <div class="text-center mb-0">
                    У пользователя ещё нет наград
                </div>
            </div>

            <div class="d-flex text-body-secondary opacity-25">
                <div class="col-4 col-lg-2">
                    <img src="/img/achievements/opening.svg" class="flex-shrink-0 rounded img-fluid">
                </div>

                <div class="mb-0 ms-3 text-balance">
                    <div class="d-block fw-bolder fs-5">Первоооткрыватель</div>
                    Первым преодолел все загадки на пути к обновлённому сайту
                </div>
            </div>

        </div>
    </div>
@endsection
