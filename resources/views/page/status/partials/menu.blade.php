@php
    /**
     * @var \App\Domain\Documentation\Version $current
     * @var \App\Domain\Documentation\Version[] $versions
     */
@endphp

<nav class="translation-progress-menu">
    @foreach($versions as $version)
        <a href="{!! route('status.show', ['version' => $version->name]) !!}"
           class="label translation-progress-menu-{{ $version->isDocumented() ? 'visible' : 'hidden' }}
               {{ isset($current) && $version->name === $current->name ? 'active' : '' }}">

            @if ($version->isDocumented())
                <span class="fa fa-check"></span>
            @else
                <span class="fa fa-times"></span>
            @endif

            Laravel {{ $version->name }}
        </a>
    @endforeach
</nav>
