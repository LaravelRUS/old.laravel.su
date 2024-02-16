@extends('layout')
@section('title', 'Использование редактора')

@section('content')

    <x-header image="/img/ui/tutorials.svg">
        <x-slot:sup>Рекомендации</x-slot>
            <x-slot:title>Использование редактора</x-slot>

                <x-slot:description>
                    Мы написалали для вас краткую инструкцию по работе с редактором
                    </x-slot>
    </x-header>

    <x-container>
        <div class="row">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded z-1">
                <div class="col-xxl-8 mx-auto">
                    <main data-controller="prism">


                        <h2>Основы Markdown</h2>
                        <p>Ниже приведены некоторые примеры часто используемого синтаксиса Markdown. Если вы хотите
                            погрузиться глубже, ознакомьтесь с
                            <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Here-Cheatsheet"
                               target="_blank"> этой шпаргалкой</a>.
                        </p>

                        <h3>Жирный и курсив</h3>

                        <p>
                            <em>Курсив: </em>
                        </p>
                        <pre class="rounded-3 mt-y"><code>*звёздочки*</code></pre>
                        <p>
                            или
                        </p>
                        <pre class="rounded-3 mb-y"><code>_подчёркивание_</code></pre>
                        <p>
                            <strong>Жирный шрифт:</strong>
                        </p>
                        <pre class="rounded-3 mt-y"><code>**две звёздочки**</code></pre>
                        <p>
                            или
                        </p>
                        <pre class="rounded-3 mb-y"><code>__два подчёркивания__</code></pre>


                        <a name="links"></a>
                        <h3> Ссылки</h3>
                        <p><a href="google.com">Ссылка</a>:</p>
                        <pre class="rounded-3 mb-y"><code>[Ссылка](google.com)</code></pre>
                        <p><a href="#links">Якорные ссылки</a> (для таких вещей, как оглавление):</p>
@php
$livewireViewCode = <<<'HTML'
## Оглавление
    * [Глава 1](#chapter-1)
    * [Глава 2](#chapter-2)


### Глава 1 <a name="chapter-1"></a>
HTML;
@endphp
                        <pre class="rounded-3 mb-y language-markup"><code language="html" class="language-html">
{{ \Illuminate\Support\Str::of($livewireViewCode)->trim() }}
                        </code></pre>





                        <h3>Встроенные изображения</h3>
                        <p>Пример вставки изображения:</p>
                        <pre class="rounded-3 mb-y"><code>![Инструменты ремесла](https://laravel.su/img/ivan.svg)</code></pre>
                        <p>Результат:</p>
                        <picture alt="Инструменты ремесла">
                            <img src="{{asset('img/ivan.svg')}}" alt="Инструменты ремесла">
                        </picture>
                        Обратите внимание, что описание отображается под изображением.

                        <h3>Заголовки</h3>
                        <p>Добавьте заголовок к своему сообщению, используя следующий синтаксис:</p>
                        <pre class="rounded-3 mb-y"><code language="markdown" class="language-markdown">
# Одна '#' для h1 заголовка
## Две '#' для h2 заголовка
...
###### Шесть '#' для h6 заголовка
                            </code></pre>

                        <h3>Списки</h3>
                        <p> Для обозначения пункта ненумерованного списка используйте символы:
                            <code>-</code>, <code>+</code> или <code>*</code>
                        </p>
                        <p>Пример:</p>
                        <pre class="rounded-3 mb-y"><code>
* Звёздочка
* Звёздочка

- Минус
- Минус
                            </code></pre>

                        <p>Результат</p>
                        <ul>
                            <li>Звёздочка</li>
                            <li>Звёздочка</li>
                        </ul>
                        <ul>
                            <li>Минус</li>
                            <li>Минус</li>
                        </ul>

                        <p>Пример нумерованного списка:</p>
                        <pre class="rounded-3 mb-y"><code>
1. Первый пункт
2. Второй пункт
3. Третий пункт
                            </code></pre>
                        <p>Результат:</p>
                        <ol>
                            <li>Первый пункт</li>
                            <li>Второй пункт</li>
                            <li>Третий пункт</li>
                        </ol>

                        <h3>Код</h3>
                        <p>
                            Поддерживается подсветка для php, js, html, markdown и д.р. Пример вставки php кода:
                        </p>
                        <pre class="rounded-3 mb-y"><code language="markdown" class="language-markdown">
```php

    public function attributes(): array
    {
        return [
            'email' => 'email address',
        ];
    }

```

</code></pre>

                        <p>Результат: </p>
                        <pre class="rounded-3 mb-y"><code language="php" class="language-php">

    public function attributes(): array
    {
        return [
            'email' => 'email address',
        ];
    }


</code></pre>


                        <h3>Цитаты</h3>
                        <p>Пример цитаты:</p>
                        <pre class="rounded-3 mb-y"><code> > Текст цитаты </code></pre>
                        <p>Результат:</p>
                        <blockquote><p>Текст цитаты</p></blockquote>






                        <h2>Дополнительные возможности</h2>
                        <p>Ссылка на ютуб:</p>
                        <pre class="rounded-3 mb-y"><code>[!youtube link="ссылка_на_видео_на_ютубе"]</code></pre>
                        <x-youtube link="https://www.youtube.com/embed/L1h-nuy0Rnw?si=aaGSUUIvE-25KgWz"/>

                        <p>Ссылка на гитхаб репозиторий:</p>
                        <pre class="rounded-3 mb-y">
                            <code>
[!github link="https://github.com/sajya"
         title="Sajya - JSON RPC"
         description="Implement the JSON-RPC 2.0 server specification for Laravel"
] </code></pre>
                        <x-github link="https://github.com/Assisted-Mindfulness/naive-bayes" title="Naive Bayes" description="Naive Bayes works by looking at a training set and making a guess based on that set."/>

                        <h3>Предупреждение и заметка</h3>
                        <p>
                            Для того чтобы обратить внимание читателя на какую-либо важную информацию, мы добавили специальные блоки.
                        </p>
                        <p>Блок <code>WARNING</code>, вы можете разместить здесь важную информацию, на которою пользователь
                            должен обязательно обратить внимание :</p>
                        <pre class="rounded-3 mb-y"><code>
> [!WARNING]
> Для использования этой функции требуется Xdebug или PCOV.
                            </code></pre>
                        <p>Результат:</p>
                        <blockquote class="docs-blockquote-note"><p>Для использования этой функции требуется Xdebug или PCOV.</p></blockquote>

                        <p>Используйте блок <code>NOTE</code> чтобы разместить заметку или дополнительную информацию:</p>
                        <pre class="rounded-3 mb-y"><code>
> [!NOTE]
> [Шпаргалка по Markdown](github.com/adam-p/markdown-here/wiki/Markdown-Here-Cheatsheet)
                            </code></pre>
                        <p>Результат</p>
                        <blockquote class="docs-blockquote-tip"><p><a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Here-Cheatsheet">

                                    Вот еще раз шпаргалка по Markdown
                                </a></p></blockquote>


                    </main>
</div>
</div>
</div>
</x-container>

@endsection
