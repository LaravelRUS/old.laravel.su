@php /** @var \App\Entity\Documentation $page */ @endphp

@if ($page->translation->getStatus() !== \App\Entity\Documentation\Translation\Status::ACTUAL)
    @if ($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::MISSING)
        {{-- <aside class="translation-status label warning">
            <span class="fa fa-times-circle-o"></span>
            Переклад відсутній
        </aside> --}}
    @elseif($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::BEHIND)
        <aside class="translation-status label notice">
            <span class="fa fa-exclamation-triangle"></span>
            Переклад трохи застарів від оригіналу
        </aside>
    @else
        <aside class="translation-status label warning">
            <span class="fa fa-times-circle-o"></span>
            Переклад сильно застарів від оригинала, може бути неактуальним для нових версій
        </aside>
    @endif
@endif
