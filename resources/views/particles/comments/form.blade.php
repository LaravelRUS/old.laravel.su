@guest
    <div class="p-4 p-xx-5 bg-body-secondary rounded-3 mt-5">
        <div class="d-flex flex-column align-items-center mx-auto col-xxl-8">
            <p class="fw-bolder">Хотите присоединиться?</p>

            <p class="text-center">Вы должны быть авторизованы, чтобы добавить ответ в обсуждение.
            К счастью, для этого достаточно двух кликов. Увидимся на другой стороне! 🌸</p>

            <a href="{{ route('login') }}" class="btn btn-outline-primary">Стать участником</a>
        </div>
    </div>
@else
    <div class="pt-4 mt-5" id="new-comment">
        <form class="row g-3"
              action="{{ route('comments.store') }}"
              method="post"
              data-controller="comment"
        >
            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />
            <div class="col-12 position-relative">
                <textarea
                    id="new-message"
                    data-comment-target="textarea"
                    data-controller="textarea-autogrow"
                    data-textarea-autogrow-resize-debounce-delay-value="500"
                    class="form-control p-5"
                    name="message"
                    rows="3"
                    minlength="3"
                    data-action="keydown.enter->comment#send:prevent input->comment#toggleSubmitButton"
                    placeholder="Написать комментарий..."></textarea>
                <div class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-2 my-sm-3 mx-3 mx-sm-5">
                    <button type="submit" class="btn btn-primary fade"
                            data-comment-target="button">Отправить</button>
                </div>
            </div>
        </form>
    </div>
@endif
