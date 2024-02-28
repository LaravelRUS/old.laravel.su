@extends('layout')
@section('title', 'Чистый код')
@section('description', 'Код должен быть понятен всем членам команды и легко читаем для разработчиков, которые могут его изменять')
@section('content')

    <x-header align="align-items-end">
        <x-slot name="sup">Чистый код</x-slot>
        <x-slot name="title">Простые правила для вашего кода</x-slot>
        <x-slot name="description">
            Код должен быть понятен всем членам команды и легко читаем для разработчиков, которые могут его изменять
        </x-slot>
        <x-slot name="content">
            {{--
            <div class="col-6 mx-auto">
                <img src="/img/gusli.svg" class="img-fluid">
            </div>
            --}}
            <div class="position-relative">

                <!-- Svg decoration -->
                {{--
                                    <figure class="position-absolute top-0 end-0 d-none d-md-block me-5">
                                        <x-icon path="l.dots" class="text-primary opacity-2" height="400" width="400" />
                                    </figure>
            --}}
                <pre class="rounded position-relative overflow-hidden bg-body p-4 text-white border border-dashed language-php" data-bs-theme="dark" tabindex="0" style="
    transform: rotate(350deg);"><code
                        class="language-php">// Получаем инсайты трендов для маркетинговой кампании
$trendInsights = $this->getTrendInsights();

// Запускаем кампанию с полученными данными
$campaignResults = $this->executeCampaign($trendInsights);

// Возвращаем результаты кампании
return response()->json([
    'status' => 'success',
    'campaignResults' => $campaignResults
]);</code></pre>
            </div>
        </x-slot>
    </x-header>


   <x-container>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                        1
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Никаких сокращений</h5>
                <p class="mb-0">
                    Правильный выбор имен переменных, классов и методов в Laravel играет ключевую роль в создании чистого и понятного кода.
                </p>
            </div>
            <div class="col-xl-8">
                <main class="bg-body-tertiary p-xl-5 p-4 rounded shadow">

                    <p>Правильный выбор имен переменных, классов и методов в Laravel играет ключевую роль в создании чистого и понятного кода. Несмотря на то, что сокращения могут показаться удобными для быстрого написания кода, они могут стать источником путаницы и усложнить поддержку кода в будущем.</p>
                    <h4 id="-">Плохие примеры</h4>
                    <p>Предположим, у нас есть следующий код:</p>
                    <pre><code class="lang-php"><span class="hljs-comment">// Плохо ❌</span>
$usr = User<span class="hljs-type">::find</span>($id);
</code></pre>
                    <p>Здесь переменная <code>$usr</code> представляет собой объект пользователя. Однако, сокращенное имя <code>$usr</code> не дает ясного понимания того, что именно хранит эта переменная. Более понятное имя, например, <code>$currentUser</code>, сразу же указывает на ее предназначение.</p>
                    <pre><code class="lang-php"><span class="hljs-comment">// Плохо ❌</span>
<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">UsrCtrl</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Controller</span> </span>{
    public function f1() {
        <span class="hljs-comment">// ...</span>
    }
}
</code></pre>
                    <p>В этом примере имя класса <code>UsrCtrl</code> не является информативным. Разработчику, который встретит этот класс впервые, будет сложно понять, за что он отвечает. Название класса должно четко отражать его функциональность, например, <code>ProfileController</code>.</p>
                    <pre><code class="lang-php"><span class="hljs-regexp">//</span> Плохо
<span class="hljs-keyword">if</span> (<span class="hljs-variable">$status</span> == <span class="hljs-number">1</span>) {
    <span class="hljs-regexp">//</span> ...
}
</code></pre>
                    <p>В этом примере магическое число <code>1</code> используется для определения статуса активности. Хотя это может быть понятно в контексте, использование именованных констант делает код более читаемым и легко поддерживаемым.</p>
                    <h4 id="-">Хорошие примеры</h4>
                    <pre><code class="lang-php"><span class="hljs-comment">// Хорошо</span>
$currentUser = User<span class="hljs-type">::find</span>($userId);
</code></pre>
                    <p>Здесь мы используем более информативное имя переменной <code>$currentUser</code>, что позволяет нам сразу понять, что она хранит информацию о текущем пользователе.</p>
                    <pre><code class="lang-php"><span class="hljs-comment">// Хорошо</span>
<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">ProfileController</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Controller</span> </span>{
    public function showProfile() {
        <span class="hljs-comment">// ...</span>
    }
}
</code></pre>
                    <p>Имя класса <code>ProfileController</code> четко указывает на его функцию - управление профилями пользователей.</p>
                    <pre><code class="lang-php"><span class="hljs-comment">// Хорошо</span>
<span class="hljs-keyword">const</span> STATUS_ACTIVE = <span class="hljs-number">1</span>;

<span class="hljs-keyword">if</span> ($status == STATUS_ACTIVE) {
    <span class="hljs-comment">// ...</span>
}
</code></pre>
                    <p>Использование именованных констант, таких как <code>STATUS_ACTIVE</code>, делает код более понятным и обеспечивает единообразие в коде.</p>

                </main>
            </div>



        </div>

       <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
           <div class="col-xl-4 position-sticky top-0 py-3">
               <div class="mb-4">
                   <div
                       class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                       2
                   </div>
               </div>
               <h5 class="fs-4 mt-2  fw-semibold">Не используйте <code>`else`</code></h5>
               <p class="mb-0">
                   Возможно ли, что `else` условие в этом вашем методе является ненужным или избыточным?
                   Могу поспорить, что ответ — да! Если да, то уберите его оттуда!
               </p>
           </div>
           <div class="col-xl-8">
               <main class="bg-body-tertiary p-xl-5 p-4 rounded shadow">

                   <p>Правильный выбор имен переменных, классов и методов в Laravel играет ключевую роль в создании
                      чистого и понятного кода. Несмотря на то, что сокращения могут показаться удобными для быстрого
                      написания кода, они могут стать источником путаницы и усложнить поддержку кода в будущем.</p>

               </main>
           </div>



       </div>


       <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
           <div class="col-xl-4 position-sticky top-0 py-3">
               <div class="mb-4">
                   <div
                       class="feature-icon-small d-inline-flex align-items-center justify-content-center border border-primary text-primary fs-4 rounded-3">
                       3
                   </div>
               </div>
               <h5 class="fs-4 mt-2  fw-semibold">Один уровень вложености</h5>
               <p class="mb-0">
                   Возможно ли, что `else` условие в этом вашем методе является ненужным или избыточным?
                   Могу поспорить, что ответ — да! Если да, то уберите его оттуда!
               </p>
           </div>
           <div class="col-xl-8">
               <main class="bg-body-tertiary p-xl-5 p-4 rounded shadow">

                   <p>Правильный выбор имен переменных, классов и методов в Laravel играет ключевую роль в создании
                      чистого и понятного кода. Несмотря на то, что сокращения могут показаться удобными для быстрого
                      написания кода, они могут стать источником путаницы и усложнить поддержку кода в будущем.</p>

               </main>
           </div>



       </div>


   </x-container>


@endsection
