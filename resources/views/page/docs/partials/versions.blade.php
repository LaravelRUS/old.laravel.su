@php
/**
 * @var \Illuminate\Support\Collection|\App\Entity\Version[] $versions
 * @var \App\Entity\Version $version
 */
@endphp

<section class="container versions"
         data-vm="VersionsPanelViewModel"
         data-bind="css: { fixed: fixed }"
>
    <nav class="versions-list">
        <a href="#" class="scroll-to-top"></a>

        @if ($versions->count())
            Версия фреймворка:

            @foreach($versions as $current)
                @continue(! $current->isDocumented && $version->name !== $current->name)

                @if($version->name === $current->name)
                    <span class="label active">{{ $current->name }}</span>
                @else
                    <a class="label" href="{!! route('docs.show', ['version' => $current->name, 'page' => $page->urn]) !!}">{{ $current->name }}</a>
                @endif
            @endforeach
        @else
            Нет доступных версий фреймворка
        @endif
    </nav>
    <aside>
        @if(isset($version))
            <a href="{!! route('status.show', ['version' => $version->name]) !!}">Прогресс перевода</a>
        @else
            <a href="{!! route('status') !!}">Прогресс перевода</a>
        @endif
    </aside>
</section>
