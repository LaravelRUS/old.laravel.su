<x-comment :comment="$comment">
    <x-slot:content>
        <p class="my-3 text-wrap text-break">{!! $comment->prettyComment() !!}</p>
    </x-slot:content>
</x-comment>


