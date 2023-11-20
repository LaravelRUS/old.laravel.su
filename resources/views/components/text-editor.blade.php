<div
    data-controller="text-editor uploads"
    data-uploads-url-value="{{ 'https://example.com/upload' }}"
    {{ $attributes->class('input text-editor stack overlay-container') }}
>
    <div class="d-flex px-4 px-lg-5 border rounded border-bottom-0 rounded-bottom-0">
        <x-text-editor-button label="Заголовок" format="header2" icon="type-h2"/>
        <x-text-editor-button label="Жырный" format="bold" icon="type-bold"/>
        <x-text-editor-button label="Курсив" format="italic" icon="type-italic"/>
        <x-text-editor-button label="Цитата" format="blockquote" icon="quote"/>
        <x-text-editor-button label="Код" format="code" icon="code-slash"/>
        <x-text-editor-button label="Ссылка" format="link" icon="link"/>
        <x-text-editor-button label="Список" format="unorderedList" icon="list-ul"/>
        <x-text-editor-button label="Нумерованный список" format="orderedList" icon="list-ol"/>
        <x-text-editor-button label="Упоминание" format="{!! json_encode(['prefix'=>'@'])  !!}" icon="at"/>

        <button type="button" title="Загрузить файл" data-action="text-editor#chooseFiles" class="btn btn-icon">
            <x-icon path="cloud-upload"/>
        </button>
    </div>

    <div class="text-editor__content grow stack">
            <textarea
                data-controller="textarea-autogrow"
                data-textarea-autogrow-resize-debounce-delay-value="500"
                name="{{ $name }}"
                id="{{ $id }}"
                class="form-control p-5 rounded-top-0"
                rows="10"
                placeholder="{{ $placeholder }}"
                data-text-editor-target="input"
                data-uploads-target="input"
            >{{ $value ?? '' }}</textarea>
    </div>
</div>
