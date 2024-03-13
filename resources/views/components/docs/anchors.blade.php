<div class="anchors">
    <ul>
        @foreach($anchors as $anchor)
            <li class="anchor-{{$anchor['level']}}">
                <a href="#{{$anchor['id']}}"
                   data-controller="scroll"
                   data-to="#{{ $anchor['id'] }}"
                >{{$anchor['text']}}</a>
            </li>
        @endforeach
    </ul>
</div>
