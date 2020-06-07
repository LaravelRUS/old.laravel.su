@php /** @var \Illuminate\Support\Collection|\App\Entity\Version[] $versions */ @endphp

<section class="container versions">
@if ($versions->count())
    Версия фреймворка:

    @foreach($versions as $haystack)
        @if(isset($version) && $version->name === $haystack->name)
            <span>{{ $haystack->name }}</span>
        @else
            <a href="{!! route('docs', ['version' => $haystack->name]) !!}">{{ $haystack->name }}</a>
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
