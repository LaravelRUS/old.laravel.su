<x-comment :comment="$comment">
    <x-slot:content>
        <p class="mb-1 text-wrap text-break">{!! $comment->prettyComment() !!}</p>
    </x-slot:content>

    <x-slot:reply>
        @can('reply', $comment)
            <form method="POST"
                  action="{{ route('comments.reply', $comment->getKey()) }}"
                  class="my-3 d-flex flex-column position-relative me-1"
                  data-controller="comment"
            >
                                    <textarea
                                        data-comment-target="textarea"
                                        data-controller="textarea-autogrow"
                                        data-textarea-autogrow-resize-debounce-delay-value="500"
                                        required
                                        placeholder="Написать комментарий"
                                        class="form-control p-4 pb-6"
                                        name="message"
                                        rows="3"
                                        minlength="3"
                                        data-action="keydown.enter->comment#send:prevent input->comment#toggleSubmitButton"
                                    ></textarea>
                <div class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-2 my-sm-3 mx-3 mx-sm-5">
                    {{-- TODO:
                    <button type="button" class="btn btn-link">Отменить</button>
                    --}}
                    <button type="submit" class="btn btn-primary fade" data-comment-target="button">Ответить</button>
                </div>
            </form>
        @endcan
    </x-slot:reply>
</x-comment>


