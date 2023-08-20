@php
    /**
     * @var \App\Domain\Version\Version $current
     * @var \App\Domain\Version\Version[] $versions
     */
@endphp

<nav class="translation-progress-menu">
    @foreach($versions as $version)
        <a href="{!! route('status.show', ['version' => $version->name]) !!}"
           class="label translation-progress-menu-{{ $version->isDocumented() ? 'visible' : 'hidden' }}
               {{ isset($current) && $version->name === $current->name ? 'active' : '' }}">

            Laravel {{ $version->name }}
        </a>
    @endforeach
</nav>
