@props(['target', 'action', 'push'])

@if(request()->is('*/stream/*') || request()->is('stream/*'))
    @fragment($target)
        <turbo-stream target="{{ $target }}" action="{{ $action ?? 'replace' }}">
            <template>
                {!! $slot !!}
            </template>
        </turbo-stream>
    @endfragment
@elseif(!empty($push))
    @push($push)
        {!! $slot !!}
    @endpush
@else
    {!! $slot !!}
@endif
