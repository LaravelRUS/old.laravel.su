@guest
    <div class="border-top pt-4 mt-5 d-flex flex-column align-items-center">
        <p>Авторизуйтесь, чтобы оставить комментарий</p>
        <a href="{{ route('login') }}" class="btn btn-outline-primary">Войти</a>
    </div>
@else
    <div class="border-top pt-4 mt-5">
        <form class="row g-3"
              action="{{ route('comments.store') }}"
              method="post"
              data-controller="comment"
        >
            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />
            <div class="col-12 position-relative">
                <textarea
                    data-controller="textarea-autogrow"
                    data-textarea-autogrow-resize-debounce-delay-value="500"
                    class="form-control p-5"
                    name="message"
                    rows="3"
                    minlength="3"
                    data-action="keydown.enter->comment#send:prevent"
                    placeholder="Написать комментарий..."></textarea>
                <div class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-3 mx-5">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </form>
    </div>
@endif
