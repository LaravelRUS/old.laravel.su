<div class="bg-white py-2 border-b border-gray-200 mb-4">
    <div class="container mx-auto px-4 flex flex-row justify-between items-center">
        <div class="flex flex-row justify-start items-center h-8">
            {{ $slot }}
        </div>
        <div>
            <a href="{!! route('docs.status') !!}">Прогресс перевода</a>
        </div>
    </div>
</div>
