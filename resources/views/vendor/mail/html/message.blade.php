<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
<img src="https://laravel.su/img/email/logo.png" class="logo" alt="{{ config('site.name') }}">
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
<p class="small text-muted mb-2">
    Веб-сайт является неофициальным ресурсом, посвященным Laravel. Мы объединяем разработчиков и
    энтузиастов, желающих обмениваться знаниями и опытом. Мы не имеем официального статуса от
    <a href="https://laravel.com" target="_blank" rel="nofollow" class="link-body-emphasis">Laravel</a> или <a href="https://github.com/taylorotwell" target="_blank" rel="nofollow" class="link-body-emphasis">Taylor Otwell</a>.
</p>
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
