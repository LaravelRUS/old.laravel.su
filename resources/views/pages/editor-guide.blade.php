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
                        <p>Markdown - это простой и удобный язык разметки, который позволяет быстро и легко
                           форматировать текст. В этом разделе мы представляем примеры наиболее часто используемого
                           синтаксиса Markdown в нашем редакторе. Эти примеры помогут вам быстро освоиться с основными
                           инструментами форматирования и улучшат ваш опыт редактирования текста.</p>

                        <p>В нашем редакторе также есть некоторые особенности, которые делают процесс редактирования еще
                           более удобным и эффективным. Мы также предоставим примеры этих особенностей, чтобы вы могли
                           использовать их в своей работе с Markdown.</p>

                        <h3>Заголовки</h3>
                        <p>Заголовки позволяют выделить важные части вашего сообщения. Используйте следующий синтаксис для добавления заголовков:</p>
                        <pre class="rounded-3 mb-y"><code language="markdown" class="language-markdown">
# Одна '#' для h1 заголовка
## Две '#' для h2 заголовка
...
###### Шесть '#' для h6 заголовка
                            </code></pre>


                        <h3>Выделение текста</h3>

                        <p>Выделение текста может быть полезным для подчеркивания важных моментов или создания акцентов в вашем сообщении. Вот несколько примеров использования выделения текста:</p>

                        <ul>
                            <li><em>Курсив:</em> используйте <code>*звёздочки*</code> или <code>_подчёркивание_</code> для выделения текста курсивом.</li>
                            <li><strong>Жирный шрифт:</strong> используйте <code>**две звёздочки**</code> или <code>__два подчёркивания__</code> для выделения текста жирным.</li>
                        </ul>


                        <a name="links" id="links"></a>
                        <h3>Гиперссылки</h3>

                        <p>Гиперссылки позволяют создавать переходы к другим веб-ресурсам или страницам. Используйте следующий синтаксис для создания гиперссылок:</p>

                        <ul>
                            <li><a href="https://laravel.su">Ссылка</a>: Это пример гиперссылки, которую вы можете создать.</li>
                        </ul>
                        <pre class="rounded-3 mb-y"><code>[Ссылка](https://laravel.su)</code></pre>


                        <p>Якорные ссылки позволяют создавать ссылки внутри документа, которые переносят пользователя к
                           определенной части страницы. Используйте следующий синтаксис для создания якорных ссылок:</p>

                        <ul>
                            <li><a href="#links">Перейти к разделу "Гиперссылки"</a>: Пример якорной ссылки, которая перенаправляет к разделу на этой странице.</li>
                        </ul>
@php
$viewLinkCode = <<<'HTML'
## Оглавление
    * [Глава 1](#chapter-1)
    * [Глава 2](#chapter-2)


### Глава 1 <a name="chapter-1"></a>
HTML;
@endphp
                        <pre class="rounded-3 mb-y language-markup"><code language="html" class="language-html">
{{ \Illuminate\Support\Str::of($viewLinkCode)->trim() }}
                        </code></pre>





                        <h3>Изображения</h3>
                        <p>Для вставки изображения используйте следующий синтаксис:</p>
                        <pre class="rounded-3 mb-y"><code>![Инструменты ремесла](https://laravel.su/img/ivan.svg)</code></pre>

                        <p>Далее демонстрируется, как выглядит изображение:</p>

                        <picture alt="Инструменты ремесла">
                            <img src="{{asset('img/ivan.svg')}}" alt="Инструменты ремесла">
                        </picture>

                        <p>Обратите внимание, что описание отображается под изображением.</p>

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
                        <pre class="rounded-3 mb-y"><code language="markdown" class="language-markdown">```php
public function attributes(): array
{
    return [
        'email' => 'email address',
    ];
}
```
</code></pre>

                        <p>Результат: </p>
                        <pre class="rounded-3 mb-y"><code language="php" class="language-php">public function attributes(): array
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
                        <x-posts.youtube link="https://www.youtube.com/embed/L1h-nuy0Rnw?si=aaGSUUIvE-25KgWz"/>

                        <p>Ссылка на гитхаб репозиторий:</p>
                        <pre class="rounded-3 mb-y">
                            <code>
[!github link="https://github.com/sajya"
         title="Sajya - JSON RPC"
         description="Implement the JSON-RPC 2.0 server specification for Laravel"
] </code></pre>

                        <x-posts.github link="https://github.com/sajya"
                                  title="Sajya - JSON RPC"
                                  description="Implement the JSON-RPC 2.0 server specification for Laravel"/>

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
> Блоковые кавычки очень удобны для имитации текста ответа.
                            </code></pre>
                        <p>Результат</p>
                        <blockquote class="docs-blockquote-tip"><p>Блоковые кавычки очень удобны для имитации текста ответа.</p></blockquote>


                    </main>
</div>
</div>
</div>
</x-container>

@endsection
