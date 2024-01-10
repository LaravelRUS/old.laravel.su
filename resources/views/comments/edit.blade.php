<x-comment :comment="$comment">
    <x-slot:content>
        <form method="POST"
              action="{{ route('comments.update', $comment->getKey()) }}"
              class="mb-3 d-flex flex-column position-relative"
                data-controller="comment"
        >
            @method('PUT')
            <textarea
                      data-comment-target="textarea"
                      data-controller="textarea-autogrow"
                      data-textarea-autogrow-resize-debounce-delay-value="500"
                      required
                      minlength="3"
                      data-action="keydown.enter->comment#send:prevent input->comment#toggleSubmitButton"
                      placeholder="Ваш комментарий"
                      class="form-control p-5"
                      name="message"
                      rows="1">{{ $comment->content }}</textarea>
            <div
                class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-2 my-sm-3 mx-3 mx-sm-5">
                <button type="submit" class="btn btn-primary fade"
                        data-comment-target="button">Обновить</button>
            </div>
        </form>
    </x-slot:content>
</x-comment>
