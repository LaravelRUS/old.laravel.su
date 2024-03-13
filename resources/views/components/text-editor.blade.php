<div
    data-controller="text-editor uploads"
    data-uploads-url-value="{{ 'https://example.com/upload' }}"
>
    <div class="position-relative">

        <div class="d-flex w-100 overflow-auto px-1 px-lg-5 border rounded-3 bg-light-subtle position-sticky top-0 z-2">

            @php
            $preview = [
                'block' => true,
                'prefix'=> '[!link link="',
                'suffix' => '"]',
            ];
            $youtube = [
                'block' => true,
                'prefix'=> '[!youtube link="',
                'suffix' => '"]',
            ];
           $github = [
                'block' => true,
                'prefix'=> '[!github link="',
                'suffix' => '" title="" description=""]',
            ];

           $hidden = [
                'block' => false,
                'prefix'=> '[!hidden text="',
                'suffix' => '"]',
            ];
            @endphp


                <x-text-editor-button label="Заголовок" format="header2" icon="type-h2"/>
                <x-text-editor-button label="Жырный" format="bold" icon="type-bold"/>
                <x-text-editor-button label="Курсив" format="italic" icon="type-italic"/>
                <x-text-editor-button label="Цитата" format="blockquote" icon="quote"/>
                <x-text-editor-button label="Код" format="code" icon="code-slash"/>
                <x-text-editor-button label="Ссылка" format="{!! json_encode(['link', 'https://']) !!}" icon="link"/>
                <x-text-editor-button label="Скрытый текст" :format="$hidden" icon="eye-slash"/>

                <x-text-editor-button label="Список" format="unorderedList" icon="list-ul"/>
                <x-text-editor-button label="Нумерованный список" format="orderedList" icon="list-ol"/>
            {{--
                <x-text-editor-button label="Упоминание" format="{!! json_encode(['prefix'=>'@'])  !!}" icon="at"/>
                --}}
                <x-text-editor-button label="YouTube" :format="$youtube" icon="youtube"/>
                <x-text-editor-button label="GitHub" :format="$github" icon="github"/>
                <x-text-editor-button label="Ссылка превью" :format="$preview" icon="easel3-fill"/>

                <a
                    href="{{route('editor-guide')}}"
                    class="btn btn-icon"
                >
                    <x-icon path="question-lg"/>
                </a>

            {{--[!youtube link=""]
                <button type="button" title="Загрузить файл" data-action="text-editor#chooseFiles" class="btn btn-icon">
                    <x-icon path="cloud-upload" class=""/>
                </button>
                --}}
        </div>


    <div class="text-editor__content grow stack position-relative">
            <textarea
                data-contro1ller="textarea-autogrow"
                data-texta1rea-autogrow-resize-debounce-delay-value="500"
                name="{{ $name }}"
                id="{{ $id }}"
                class="w-100 my-3 form-editor clone-editor"
                rows="14"
                spellcheck="false"
                placeholder="{{ $placeholder }}"
                data-action="input->text-editor#onInput:prevent"
                data-text-editor-target="input"
                data-uploads-target="input"
            >{{ $value ?? '' }}</textarea>

        <pre class="wrapper-visualizer"><code id="visualizer" class="form-control w-100 my-3 form-editor clone-editor"></code></pre>
    </div>
    </div>
</div>
