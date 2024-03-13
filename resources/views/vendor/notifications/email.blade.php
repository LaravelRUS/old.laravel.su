<x-mail::message>
{{-- Приветствие --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Упс!')
@else
# @lang('Уведомление в сообществе! 🎉 ')
@endif
@endif

{{-- Введение --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Кнопка действия --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Завершение --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Прощание --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Да прибудет с вами Artisan! ⚒️
@endif

{{-- Дополнительный текст --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "Если у вас возникли проблемы с нажатием кнопки \":actionText\", скопируйте и вставьте URL ниже\n".
    'в ваш веб-браузер:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset

<x-slot:footer>
    <x-mail::footer>
        <p class="small text-muted mb-2">
            Веб-сайт является неофициальным ресурсом, посвященным Laravel. Мы объединяем разработчиков и
            энтузиастов, желающих обмениваться знаниями и опытом. Мы не имеем официального статуса от
            <a href="https://laravel.com" target="_blank" rel="nofollow" class="link-body-emphasis">Laravel</a> или <a href="https://github.com/taylorotwell" target="_blank" rel="nofollow" class="link-body-emphasis">Taylor Otwell</a>.
        </p>
    </x-mail::footer>
</x-slot:footer>
</x-mail::message>
