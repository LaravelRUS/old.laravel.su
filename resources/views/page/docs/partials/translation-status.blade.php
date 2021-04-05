@php /** @var \App\Entity\Documentation $page */ @endphp

@if ($page->translation->getStatus() !== \App\Entity\Documentation\Translation\Status::ACTUAL)
    @if ($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::MISSING)
        <aside class="translation-status label warning">
            <span class="fa fa-times-circle-o"></span>
            Перевод отсутствует
        </aside>
    @elseif($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::BEHIND)
        <aside class="translation-status label notice">
            <span class="fa fa-exclamation-triangle"></span>
            Перевод немного отстаёт от оригинала
        </aside>
    @else
        <aside class="translation-status label warning">
            <span class="fa fa-times-circle-o"></span>
            Перевод сильно отстаёт от оригинала, может быть неактуален
        </aside>
    @endif
@endif
