@extends('layout')
@section('title', 'Pastebin')
@section('content')

    <x-container>

        <form action="{{ route('pastebin.store') }}" method="post">
            <div data-controller="prism" class="rounded overflow-hidden">
            <pre contenteditable="true"
                 class="rounded line-numbers border"
                 style="min-height: 600px;"
                 data-action="input->prism#paste keydown->prism#keydownPaste"
                 data-prism-target="editable"><code id="yaml"
                                                    placeholder="Поделитесь своим фрагментом кода тут!">{{ $content }}</code></pre>

                <input name="code" data-prism-target="output" type="hidden" required value="{{ $content }}">
            </div>
            <div
                class="mt-3 d-flex flex-column flex-md-row justify-content-center justify-content-md-start align-items-md-baseline">
                <button type="submit" class="btn btn-primary mb-3 mb-md-0">
                    {{ $content ? "Обновить" : "Сохранить" }}
                </button>

                <a href="{{ route('pastebin') }}" type="submit"
                   class="btn btn-link text-decoration-none link-secondary mb-3 mb-md-0">
                    Новый фрагмент
                </a>

                <div class="d-flex align-items-baseline clipboard ms-auto" data-controller="clipboard"
                     data-clipboard-done-class="done">
                    <small class="user-select-all me-2 col-6 col-md-auto text-truncate lh-1"
                           data-clipboard-target="source">{{ url()->current() }}</small>
                    <a href="#"
                       data-action="clipboard#copy">
                        <x-icon path="i.copy" class="copy-action" data-controller="tooltip"
                                title="Скопировать в буфер"/>
                        <x-icon path="i.copy-fill" class="copy-done" data-controller="tooltip" title="Скопировано"/>
                    </a>
                </div>
            </div>
        </form>
    </x-container>

    @include('particles.positions')

@endsection
