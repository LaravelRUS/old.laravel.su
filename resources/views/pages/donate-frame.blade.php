@extends('html')
@section('title', 'Сделать пожертвование')

@section('body')

    <div class="min-vh-100 d-flex align-items-center align-content-between align-content-center">
        <div class="mx-auto">
            <div class="rounded border border-dashed overflow-hidden bg-white-only p-3 mb-3">
                <iframe src="https://yoomoney.ru/quickpay/fundraise/widget?billNumber=116BVVNIEE7.240301&" class="bg-white-only rounded overflow-hidden" width="480" height="480" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
            </div>
            <p class="text-center opacity-75"><a href="{{ route('home') }}" class="px-3 link-body-emphasis text-decoration-none">Вернуться на сайт</a></p>
        </div>
    </div>
@endsection
