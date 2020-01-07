@if($commitsAhead == 0)

    <div class="bg-green-100 p-4 mb-2 border-b border-gray-200 text-green-600 rounded-tl rounded-tr text-sm">
        Перевод полностью актуален оригиналу.
    </div>

@elseif($commitsAhead > 0 && $commitsAhead < 10)

    <div class="bg-orange-100 p-4 mb-2 border-b border-gray-200 text-orange-600 rounded-tl rounded-tr text-sm">
        Перевод немного отстаёт от оригинала. Коммитов не переведено: {{$commitsAhead}}
    </div>

@else

    <div class="bg-red-100 p-4 mb-2 border-b border-gray-200 text-red-600 rounded-tl rounded-tr text-sm">
        Перевод сильно отстаёт от оригинала, может быть неактуален. Коммитов не переведено: {{$commitsAhead}}
    </div>

@endif
