@props(['target', 'action', 'push'])

@if (!request()->isMethodSafe() || request()->is('*/stream/*') || request()->is('stream/*'))
    @fragment($target)
        <turbo-stream target="{{ $target }}" action="{{ $action ?? 'replace' }}">
            <template>
                @if (collect(['replace', 'update'])->contains($action ?? 'replace'))
                    <div {{ $attributes->merge(['id' => $target]) }}>
                        {!! $slot !!}
                    </div>
                @else
                    {!! $slot !!}
                @endif
            </template>
        </turbo-stream>
    @endfragment
@elseif(!empty($push))
    @push($push)
        <div {{ $attributes->merge(['id' => $target]) }}>
            {!! $slot !!}
        </div>
    @endpush
@else
    <div {{ $attributes->merge(['id' => $target]) }}>
        {!! $slot !!}
    </div>
@endif
