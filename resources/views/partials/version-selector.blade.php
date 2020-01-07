
<div class="mr-3">Версия фреймворка:</div>

@foreach($versions as $i)
    @if(isset($version) && $version->title === $i->title)
        <span class="bg-red-500 text-white px-3 py-1 mr-2 border border-red-500 rounded">
            {{ $i->title }}
        </span>
    @else
        <a class="px-3 py-1 mr-2 border border-red-500 rounded" href="/docs/{{ $i->title }}">{{ $i->title }}</a>
    @endif
@endforeach


