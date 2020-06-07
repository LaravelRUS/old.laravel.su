@php /** @var \App\Entity\Documentation $page */ @endphp

@if ($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::MISSING)
    <aside class="translation-status missing">
        Перевод полностью отсутсвует.
    </aside>
@elseif($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::ACTUAL)
    <aside class="translation-status relevant">
        Перевод полностью актуален оригиналу.
    </aside>
@elseif($page->translation->getStatus() === \App\Entity\Documentation\Translation\Status::BEHIND)
    <aside class="translation-status behind">
        Перевод немного отстаёт от оригинала.
        Коммитов не переведено: {{ $page->translation->diff }}
    </aside>
@else
    <aside class="translation-status far-behind">
        Перевод сильно отстаёт от оригинала, может быть неактуален.
        Коммитов не переведено: {{ $page->translation->diff }}
    </aside>
@endif
