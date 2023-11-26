<x-comment :comment="$comment">
    <x-slot:content>
        <p class="mb-1 text-wrap text-break">{!! $comment->prettyComment() !!}</p>
    </x-slot:content>

    <x-slot:reply>
        @can('reply', $comment)
            <form method="POST"
                  action="{{ route('comments.reply', $comment->getKey()) }}"
                  class="my-3 d-flex flex-column position-relative"
                  data-controller="comment"
            >
                                    <textarea
                                        data-controller="textarea-autogrow"
                                        data-textarea-autogrow-resize-debounce-delay-value="500"
                                        required
                                        placeholder="Написать комментарий"
                                        class="form-control p-5"
                                        name="message"
                                        rows="3"
                                        minlength="3"
                                        data-action="keydown.enter->comment#send:prevent"
                                    ></textarea>
                <div class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-3 mx-5">
                    <button type="button" class="btn btn-link">Отменить</button>
                    <button type="submit" class="btn btn-primary">Ответить</button>
                </div>
            </form>
        @endcan
    </x-slot:reply>
</x-comment>


