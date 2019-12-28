@if(count($documentedVersions) > 0)
<div class="mr-3">Версия фреймворка:</div>
@foreach($documentedVersions as $version)
    @if($version->title === $versionTitle)
        <div class="bg-red-500 text-white px-3 py-1 mr-2 border border-red-500 rounded">
            <span>{{$version->title}}</span>
        </div>
    @else
        <div class="px-3 py-1 mr-2 border border-red-500 rounded">
            <a href="/docs/{{$version->title}}" class="">{{$version->title}}</a>
        </div>
    @endif
@endforeach
@endif
