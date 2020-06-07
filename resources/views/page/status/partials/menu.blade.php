@php
/**
 * @var \App\Entity\Version $current
 * @var \App\Entity\Version[] $versions
 */
@endphp

<nav class="translation-progress-menu">
    @foreach($versions as $version)
        <span class="translation-progress-{{ $version->isDocumented ? 'visible' : 'hidden' }}">
        @if ($version->isDocumented)
            <span class="fa fa-check"></span>
        @else
            <span class="fa fa-times"></span>
        @endif

        @if (! isset($current) || $version->name !== $current->name)
            <a href="{!! route('status.show', ['version' => $version->name]) !!}">
        @endif

        Laravel {{ $version->name }}

        @if (! isset($current) || $version->name !== $current->name)
            </a>
        @endif

        </span>
    @endforeach
</nav>
