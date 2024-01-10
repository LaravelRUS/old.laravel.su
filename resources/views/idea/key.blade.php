@extends('idea.base')
@section('title', 'Laravel Idea Key')

@section('col')

    <div >
        @csrf

        <p>
            Русскоязычные участники из России, Белоруссии и Украины имеют возможность подать заявку на
            получение бесплатного ключа. Заполните форму, и после того, как ваш запрос
            будет обработан, мы отправим вам ключ.
        </p>

        <div class="p-4 bg-body-secondary rounded">
            <div class="mb-3">
                {{$key->key}}
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-link clipboard" data-controller="clipboard"
                        data-action="clipboard#copy"
                        data-clipboard-done-class="done">
                    <span class="d-none"
                          data-clipboard-target="source">{{ $key->key }}</span>
                    <x-icon path="bs.copy" class="copy-action" data-controller="tooltip"
                            title="Скопировать в буфер"/>
                    <x-icon path="bs.check2" class="copy-done" data-controller="tooltip" title="Скопировано"/>
                </button>
            </div>
        </div>



    </div>
@endsection
