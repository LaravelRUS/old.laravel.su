<div
    class="d-md-flex text-center text-md-start align-items-center gap-4 bg-body px-5 py-4 mb-4 rounded position-relative">

    <div class="d-none col-md-1">
      <x-icon path="bs.github" class="w-100 h-100" />
    </div>

    <div class="flex-grow-1 text-center text-lg-start pe-md-3">
        <label class="fw-bolder text-balance">{{ $title }}</label>
        <p class="text-balance">{{ $description }}</p>
    </div>

    <div class="col-md-2">
        <a href="{{ $link }}" target="_blank" rel="noopener" class="link-body-emphasis stretched-link text-decoration-none icon-link icon-link-hover">
            Перейти
            <x-icon path="bs.arrow-right"/>
        </a>
    </div>
</div>
