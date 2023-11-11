{{--
<details>
    <summary>Оглавление</summary>
</details>
--}}

<div class="anchors">
    @if(count($anchors) > 1)
        <ul>
            @foreach($anchors as $anchor)
                <li class="anchor-{{$anchor['level']}}">
                    <a href="#{{$anchor['id']}}" data-controller="scroll" data-to="#{{ $anchor['id'] }}">{{$anchor['text']}}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
