@php
    /**
     * @var \Illuminate\Support\Collection|\App\Domain\Documentation\Version[] $versions
     * @var \App\Domain\Documentation\Version $version
     * @var \App\Domain\Documentation\Documentation $page
     */
@endphp

<section class="container versions"
         data-vm="VersionsPanelViewModel"
         data-bind="css: { fixed: fixed }"
>
    <nav class="versions-list">
        <a href="#" class="scroll-to-top"></a>

        @if ($versions->count())
            <span class="label title">Версия</span>

            @foreach($versions as $current)
                @continue(!$current->isDocumented() && $version->name !== $current->name)

                @if($version->name === $current->name)
                    <span class="label active">{{ $current->name }}</span>
                @else
                    <a class="label"
                       href="{!! route('docs.show', ['version' => $current->name, 'page' => $page->getUrn()]) !!}">{{ $current->name }}</a>
                @endif
            @endforeach
        @else
            Нет доступных версий фреймворка
        @endif
    </nav>
    <aside>
        @if(isset($version))
            @if ($page->translation->getStatus() === \App\Domain\Documentation\Translation\Status::MISSING)
                <a class="translation-status label warning" href="{!! route('status.show', ['version' => $version->name]) !!}">
                    Перевод отсутствует
                </a>
            @elseif($page->translation->getStatus() === \App\Domain\Documentation\Translation\Status::ACTUAL)
                <a class="translation-status label success" href="{!! route('status.show', ['version' => $version->name]) !!}">
                    Перевод актуален
                </a>
            @elseif($page->translation->getStatus() === \App\Domain\Documentation\Translation\Status::BEHIND)
                <a class="translation-status label notice" href="{!! route('status.show', ['version' => $version->name]) !!}">
                    Немного отстаёт от оригинала
                </a>
            @else
                <a class="translation-status label warning" href="{!! route('status.show', ['version' => $version->name]) !!}">
                    Сильно отстаёт от оригинала
                </a>
            @endif
        @endif
    </aside>
</section>
