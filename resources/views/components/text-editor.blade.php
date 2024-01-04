<div
    data-controller="text-editor uploads"
    data-uploads-url-value="{{ 'https://example.com/upload' }}"
>
    <div class="position-relative">

        <div class="d-flex w-100 overflow-auto px-1 px-lg-5 border rounded-3 bg-light-subtle position-sticky top-0 z-1">
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
                    <x-icon path="cloud-upload" class=""/>
                </button>
        </div>


    <div class="text-editor__content grow stack">
            <textarea
                data-controller="textarea-autogrow"
                data-textarea-autogrow-resize-debounce-delay-value="0"
                name="{{ $name }}"
                id="{{ $id }}"
                class="w-100 my-3 form-editor"
                rows="14"
                placeholder="{{ $placeholder }}"
                data-text-editor-target="input"
                data-uploads-target="input"
            >{{ $value ?? '' }}</textarea>
    </div>
    </div>
</div>
