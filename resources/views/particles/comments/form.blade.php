<div class="border-top pt-4 mt-5">
    <form class="row g-3" action="{{ route('comments.store') }}" method="post">
        <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
        <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />
        <div class="col-12 position-relative">
            <textarea class="form-control p-5" name="message"  rows="3" placeholder="Написать комментарий..."></textarea>
            <div class="d-grid gap-3 d-md-flex justify-content-md-start position-absolute bottom-0 end-0 my-3 mx-5">
                <button type="button" class="btn btn-link">Отменить</button>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
</div>
