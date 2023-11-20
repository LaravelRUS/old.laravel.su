<x-comment :comment="$comment">
    <x-slot:content>
        <p class="mb-1 text-wrap text-break">{!! $comment->prettyComment() !!}</p>
    </x-slot:content>
</x-comment>


