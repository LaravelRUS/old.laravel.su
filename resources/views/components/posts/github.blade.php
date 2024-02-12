<div
    class="d-md-flex text-md-start align-items-center gap-4 bg-body px-5 py-4 mb-4 rounded position-relative">

    <div class=" d-block col-2 col-md-1 mb-2 mb-md-0">
      <x-icon path="bs.github" class="w-100 h-100" />
    </div>

    <div class="flex-grow-1 text-lg-start pe-md-3">
        <label class="fw-bolder text-balance">{{ $title }}</label>
        <p class="text-balance">{{ $description }}</p>
    </div>

    <div class="col-md-2">
        <a href="{{ $link }}" target="_blank" rel="noopener" class="link-body-emphasis stretched-link text-decoration-none icon-link icon-link-hover">
            Перейти
            <x-icon path="i.arrow-right" class="bi"/>
        </a>
    </div>
</div>
