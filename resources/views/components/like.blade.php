<form action="{{ route($route, $model) }}" method="post" id="@domid($model, 'like')">
    <button
        class="btn btn-link p-0 d-flex align-items-center text-decoration-none me-4 {{ $model->has_liked ? 'text-primary' : 'text-body-secondary' }}"
        type="submit">
        <x-icon path="{{ $model->has_liked ? 'i.heart-fill' : 'i.heart' }}"/>
        <span class="ms-2">{{ $model->likers_count }}</span>
    </button>
</form>

