@php
/**
 * @var \Illuminate\Support\Collection|\App\Entity\Version[] $versions
 * @var \App\Entity\Version $version
 */
@endphp

<section class="container versions">
    @if ($versions->count())
        Версия фреймворка:

        @foreach($versions as $current)
            @continue(! $current->isDocumented && $version->name !== $current->name)

            @if($version->name === $current->name)
                <span class="label active">{{ $current->name }}</span>
            @else
                <a class="label" href="{!! route('docs', ['version' => $current->name]) !!}">{{ $current->name }}</a>
            @endif
        @endforeach

        <aside>
            @if(isset($version))
                <a href="{!! route('status.show', ['version' => $version->name]) !!}">Прогресс перевода</a>
            @else
                <a href="{!! route('status') !!}">Прогресс перевода</a>
            @endif
        </aside>
    @else
        Нет доступных версий фреймворка
    @endif
</section>
