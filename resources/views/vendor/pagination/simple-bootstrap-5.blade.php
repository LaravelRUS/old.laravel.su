@if ($paginator->hasPages())
    <div class="bg-body-tertiary mb-4 px-xxl-5 p-4 rounded">
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination d-flex mb-0 align-items-sm-center justify-content-between">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded-3 btn">
                         <x-icon path="i.arrow-left"/>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-3 btn" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <x-icon path="i.arrow-left"/>
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-3 btn" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <x-icon path="i.arrow-right" class="bi"/>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded-3 btn">
                        <x-icon path="i.arrow-right" class="bi"/>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
    </div>
@endif
