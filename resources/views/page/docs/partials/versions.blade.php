@php
    /**
     * @var \Illuminate\Support\Collection|\App\Domain\Documentation\Version[] $versions
     * @var \App\Domain\Documentation\Version $version
     * @var \Add\Domain\Documentation\Documentation $page
     */
@endphp

<section class="container versions"
         data-vm="VersionsPanelViewModel"
         data-bind="css: { fixed: fixed }"
>
    <nav class="versions-list">
        <a href="#" class="scroll-to-top"></a>

        @if ($versions->count())
            <span class="label title">Laravel</span>

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
            <a class="label" href="{!! route('status.show', ['version' => $version->name]) !!}">Прогресс перевода</a>
        @else
            <a class="label" href="{!! route('status') !!}">Прогресс перевода</a>
        @endif
    </aside>
</section>
