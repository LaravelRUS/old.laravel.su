<x-comment :comment="$comment">
    <x-slot:content>
        <form method="POST"
              action="{{ route('comments.update', $comment->getKey()) }}"
              class="mb-3 d-flex flex-column position-relative"
                data-controller="comment"
        >
            @method('PUT')
            <textarea data-controller="textarea-autogrow"
                      data-textarea-autogrow-resize-debounce-delay-value="500"
                      required
                      minlength="3"
                      data-action="keydown.enter->comment#send:prevent"
                      placeholder="Ваш комментарий"
                      class="form-control p-5"
                      name="message"
                      rows="3">{{ $comment->content }}</textarea>
            <div
                class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-3 mx-5">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </x-slot:content>
</x-comment>
