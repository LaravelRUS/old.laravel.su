@extends('idea.base')
@section('title', 'Laravel Idea')
@section('col')

    <form action="{{ route('idea.store') }}" method="POST">
        @csrf

        <p>
            Русскоязычные участники из России, Белоруссии и Украины имеют возможность подать заявку на
            получение бесплатного ключа. Заполните форму, и после того, как ваш запрос
            будет обработан, мы отправим вам ключ.
        </p>

        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col mb-3">
                <label for="first_name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Иван" required>
            </div>

            <div class="col mb-3">
                <label for="last_name" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Иванов" required>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col mb-3">
                <label for="city" class="form-label">Город</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Липецк" required>
            </div>

            <div class="col mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.ru" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Расскажите о себе</label>
            <textarea class="form-control" id="message" name="message"
                      placeholder="Мы будем рады узнать о ваших целях и мотивации для получения бесплатного ключа."
                      rows="4"></textarea>
        </div>
        <div class="d-block d-sm-inline-block">
            <button type="submit" class="w-100 btn btn-primary">Отправить заявку</button>
        </div>


    </form>
@endsection
