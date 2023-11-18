@extends('layout')

@section('content')
    <x-header image="/img/sign.svg">
        <x-slot:sup>Одна платформа, множество вариантов</x-slot>
        <x-slot:title>Всё что нужно для достижения цели.</x-slot>

        <x-slot:description>
            «Из коробки» Laravel предлагает элегантные решения для множества функций, необходимых всем современным
            приложениям. Пришло время начать создавать их!
        </x-slot>
    </x-header>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="authentication" title="Authentication" icon="lock-closed">
                    <p>Authenticating users is as simple as adding an authentication middleware to your Laravel route
                       definition:</p>

                    <pre><code language="php">
            Route::get('/profile', ProfileController::class)
                ->middleware('auth');
        </code></pre>

                    <p>Once the user is authenticated, you can access the authenticated user via the <code>Auth</code>
                       facade:</p>

                    <pre><code language="php">
            use Illuminate\Support\Facades\Auth;

            // Get the currently authenticated user...
            $user = Auth::user();
        </code></pre>

                    <p>Of course, you may define your own authentication middleware, allowing you to customize the
                       authentication process.</p>

                    <p>For more information on Laravel's authentication features, check out the <a
                            href="https://laravel.com/docs/authentication">authentication documentation</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="authentication" title="Authentication" icon="lock-closed">
                    <p>Authenticating users is as simple as adding an authentication middleware to your Laravel route
                       definition:</p>

                    <pre><code language="php">
            Route::get('/profile', ProfileController::class)
                ->middleware('auth');
        </code></pre>

                    <p>Once the user is authenticated, you can access the authenticated user via the <code>Auth</code>
                       facade:</p>

                    <pre><code language="php">
            use Illuminate\Support\Facades\Auth;

            // Get the currently authenticated user...
            $user = Auth::user();
        </code></pre>

                    <p>Of course, you may define your own authentication middleware, allowing you to customize the
                       authentication process.</p>

                    <p>For more information on Laravel's authentication features, check out the <a
                            href="https://laravel.com/docs/authentication">authentication documentation</a>.</p>
                </div>

                <div name="authorization" title="Authorization" icon="identification">
                    <p>You'll often need to check whether an authenticated user is authorized to perform a specific
                       action. Laravel's model policies make it a breeze:</p>

                    <pre><code language="bash">
            php artisan make:policy UserPolicy
        </code></pre>

                    <p>Once you've defined your authorization rules in the generated policy class, you can authorize the
                       user's request in your controller methods:</p>

                    <pre><code language="php">
            public function update(Request $request, Invoice $invoice)
            {
                Gate::authorize('update', $invoice);// [tl! focus]

                $invoice->update(/* ... */);
            }
        </code></pre>

                    <p><a href="https://laravel.com/docs/authorization">Learn more</a></p>
                </div>

                <div name="eloquent" title="Eloquent ORM" icon="table-cells">
                    <p>Scared of databases? Don't be. Laravel’s Eloquent ORM makes it painless to interact with your
                       application's data, and models, migrations, and relationships can be quickly scaffolded:</p>

                    <pre><code language="text">
            php artisan make:model Invoice --migration
        </code></pre>

                    <p>Once you've defined your model structure and relationships, you can interact with your database
                       using Eloquent's powerful, expressive syntax:</p>

                    <pre><code language="php">
            // Create a related model...
            $user->invoices()->create(['amount' => 100]);

            // Update a model...
            $invoice->update(['amount' => 200]);

            // Retrieve models...
            $invoices = Invoice::unpaid()->where('amount', '>=', 100)->get();

            // Rich API for model interactions...
            $invoices->each->pay();
        </code></pre>

                    <p><a href="https://laravel.com/docs/eloquent">Learn more</a></p>
                </div>

                <div name="migrations" title="Database Migrations" icon="circle-stack">
                    <p>Migrations are like version control for your database, allowing your team to define and share
                       your application's database schema definition:</p>

                    <pre><code language="php">
            public function up(): void
            {
                Schema::create('flights', function (Blueprint $table) {
                    $table->uuid()->primary();
                    $table->foreignUuid('airline_id')->constrained();
                    $table->string('name');
                    $table->timestamps();
                });
            }
        </code></pre>

                    <p><a href="https://laravel.com/docs/migrations">Learn more</a></p>
                </div>

                <div name="validation" title="Validation" icon="check-badge">
                    <p>Laravel has over 90 powerful, built-in validation rules and, using Laravel Precognition, can
                       provide live validation on your frontend:</p>

                    <pre><code language="php">
            public function update(Request $request)
            {
                $validated = $request->validate([// [tl! focus:start]
                    'email' => 'required|email|unique:users',
                    'password' => Password::required()->min(8)->uncompromised(),
                ]);// [tl! focus:end]

                $request->user()->update($validated);
            }
        </code></pre>

                    <p><a href="https://laravel.com/docs/validation">Learn more</a></p>
                </div>

                <div name="notifications" title="Notifications & Mail" icon="bell-alert">
                    <p>Use Laravel to quickly send beautifully styled notifications to your users via email, Slack, SMS,
                       in-app, and more:</p>

                    <pre><code language="bash">
            php artisan make:notification InvoicePaid
        </code></pre>

                    <p>Once you have generated a notification, you can easily send the message to one of your
                       application's users:</p>

                    <pre><code language="php">
            $user->notify(new InvoicePaid($invoice));
        </code></pre>

                    <p><a href="https://laravel.com/docs/notifications">Learn more</a></p>
                </div>

                <div name="storage" title="File Storage" icon="archive-box">
                    <p>Laravel provides a robust filesystem abstraction layer, providing a single, unified API for
                       interacting with local filesystems and cloud based filesystems like Amazon S3:</p>

                    <pre><code language="php">
            $path = $request->file('avatar')->store('s3');
        </code></pre>

                    <p>Regardless of where your files are stored, interact with them using Laravel's simple, elegant
                       syntax:</p>

                    <pre><code language="php">
            $content = Storage::get('photo.jpg');

            Storage::put('photo.jpg', $content);
        </code></pre>

                    <p><a href="https://laravel.com/docs/filesystem">Learn more</a></p>
                </div>

                <div name="queues" title="Job Queues" icon="queue-list">
                    <p>Laravel lets you to offload slow jobs to a background queue, keeping your web requests
                       snappy:</p>

                    <pre><code language="php">
            $podcast = Podcast::create(/* ... */);

            ProcessPodcast::dispatch($podcast)->onQueue('podcasts');// [tl! focus]
        </code></pre>

                    <p>You can run as many queue workers as you need to handle your workload:</p>

                    <pre><code language="bash">
            php artisan queue:work redis --queue=podcasts
        </code></pre>

                    <p>For more visibility and control over your queues, <a href="https://laravel.com/docs/horizon">Laravel
                                                                                                                    Horizon</a>
                       provides a beautiful dashboard and code-driven configuration for your Laravel-powered Redis
                       queues.</p>

                    <p><strong>Learn more</strong></p>
                    <ul>
                        <li><a href="https://laravel.com/docs/queues">Job Queues</a></li>
                        <li><a href="https://laravel.com/docs/horizon">Laravel Horizon</a></li>
                    </ul>
                </div>

                <div name="scheduling" title="Task Scheduling" icon="clock">
                    <p>Schedule recurring jobs and commands with an expressive syntax and say goodbye to complicated
                       configuration files:</p>

                    <pre><code language="php">
            $schedule->job(NotifySubscribers::class)->hourly();
        </code></pre>

                    <p>Laravel's scheduler can even handle multiple servers and offers built-in overlap prevention:</p>

                    <pre><code language="php">
            $schedule->job(NotifySubscribers::class)
                ->dailyAt('9:00')
                ->onOneServer();
                ->withoutOverlapping();
        </code></pre>

                    <p><a href="https://laravel.com/docs/scheduling">Learn more</a></p>
                </div>

                <div name="testing" title="Testing" icon="command-line">
                    <p>Laravel is built for testing. From unit tests to browser tests, you’ll feel more confident in
                       deploying your application:</p>

                    <pre><code language="php">
            $user = User::factory()->create();

            $this->browse(fn (Browser $browser) => $browser
                ->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home')
                ->assertSee("Welcome {$user->name}")
            );
        </code></pre>

                    <p><a href="https://laravel.com/docs/testing">Learn more</a></p>
                </div>

                <div name="events" title="Events & WebSockets" icon="arrows-right-left">
                    <p>Laravel's events allow you to send and listen for events across your application, and listeners
                       can easily be dispatched to a background queue:</p>

                    <pre><code language="php">
            OrderShipped::dispatch($order);
        </code></pre>

                    <pre><code language="php">
            class SendShipmentNotification implements ShouldQueue
            {
                public function handle(OrderShipped $event): void
                {
                    // ...
                }
            }
        </code></pre>

                    <p>Your frontend application can even subscribe to your Laravel events using <a
                            href="https://laravel.com/docs/broadcasting">Laravel Echo</a> and WebSockets, allowing you
                       to build real-time, dynamic applications:</p>

                    <pre><code language="javascript">
            Echo.private(`orders.${orderId}`)
                .listen('OrderShipped', (e) => {
                    console.log(e.order);
                });
        </code></pre>

                    <p><a href="https://laravel.com/docs/events">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="authorization" title="Authorization" icon="identification">
                    <p>You'll often need to check whether an authenticated user is authorized to perform a specific
                       action. Laravel's model policies make it a breeze:</p>

                    <pre><code language="bash">
            php artisan make:policy UserPolicy
        </code></pre>

                    <p>Once you've defined your authorization rules in the generated policy class, you can authorize the
                       user's request in your controller methods:</p>

                    <pre><code language="php">
            public function update(Request $request, Invoice $invoice)
            {
                Gate::authorize('update', $invoice);// [tl! focus]

                $invoice->update(/* ... */);
            }
        </code></pre>

                    <p><a href="https://laravel.com/docs/authorization">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="eloquent" title="Eloquent ORM" icon="table-cells">
                    <p>Scared of databases? Don't be. Laravel’s Eloquent ORM makes it painless to interact with your
                       application's data, and models, migrations, and relationships can be quickly scaffolded:</p>

                    <pre><code language="text">
            php artisan make:model Invoice --migration
        </code></pre>

                    <p>Once you've defined your model structure and relationships, you can interact with your database
                       using Eloquent's powerful, expressive syntax:</p>

                    <pre><code language="php">
            // Create a related model...
            $user->invoices()->create(['amount' => 100]);

            // Update a model...
            $invoice->update(['amount' => 200]);

            // Retrieve models...
            $invoices = Invoice::unpaid()->where('amount', '>=', 100)->get();

            // Rich API for model interactions...
            $invoices->each->pay();
        </code></pre>

                    <p><a href="https://laravel.com/docs/eloquent">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="migrations" title="Database Migrations" icon="circle-stack">
                    <p>Migrations are like version control for your database, allowing your team to define and share
                       your application's database schema definition:</p>

                    <pre><code language="php">
            public function up(): void
            {
                Schema::create('flights', function (Blueprint $table) {
                    $table->uuid()->primary();
                    $table->foreignUuid('airline_id')->constrained();
                    $table->string('name');
                    $table->timestamps();
                });
            }
        </code></pre>

                    <p><a href="https://laravel.com/docs/migrations">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="validation" title="Validation" icon="check-badge">
                    <p>Laravel has over 90 powerful, built-in validation rules and, using Laravel Precognition, can
                       provide live validation on your frontend:</p>

                    <pre><code language="php">
            public function update(Request $request)
            {
                $validated = $request->validate([// [tl! focus:start]
                    'email' => 'required|email|unique:users',
                    'password' => Password::required()->min(8)->uncompromised(),
                ]);// [tl! focus:end]

                $request->user()->update($validated);
            }
        </code></pre>

                    <p><a href="https://laravel.com/docs/validation">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="notifications" title="Notifications & Mail" icon="bell-alert">
                    <p>Use Laravel to quickly send beautifully styled notifications to your users via email, Slack, SMS,
                       in-app, and more:</p>

                    <pre><code language="bash">
            php artisan make:notification InvoicePaid
        </code></pre>

                    <p>Once you have generated a notification, you can easily send the message to one of your
                       application's users:</p>

                    <pre><code language="php">
            $user->notify(new InvoicePaid($invoice));
        </code></pre>

                    <p><a href="https://laravel.com/docs/notifications">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">
            <div>
                <div name="storage" title="File Storage" icon="archive-box">
                    <p>Laravel provides a robust filesystem abstraction layer, providing a single, unified API for
                       interacting with local filesystems and cloud based filesystems like Amazon S3:</p>

                    <pre><code language="php">
            $path = $request->file('avatar')->store('s3');
        </code></pre>

                    <p>Regardless of where your files are stored, interact with them using Laravel's simple, elegant
                       syntax:</p>

                    <pre><code language="php">
            $content = Storage::get('photo.jpg');

            Storage::put('photo.jpg', $content);
        </code></pre>

                    <p><a href="https://laravel.com/docs/filesystem">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="queues" title="Job Queues" icon="queue-list">
                    <p>Laravel lets you to offload slow jobs to a background queue, keeping your web requests
                       snappy:</p>

                    <pre><code language="php">
            $podcast = Podcast::create(/* ... */);

            ProcessPodcast::dispatch($podcast)->onQueue('podcasts');// [tl! focus]
        </code></pre>

                    <p>You can run as many queue workers as you need to handle your workload:</p>

                    <pre><code language="bash">
            php artisan queue:work redis --queue=podcasts
        </code></pre>

                    <p>For more visibility and control over your queues, <a href="https://laravel.com/docs/horizon">Laravel
                                                                                                                    Horizon</a>
                       provides a beautiful dashboard and code-driven configuration for your Laravel-powered Redis
                       queues.</p>

                    <p><strong>Learn more</strong></p>
                    <ul>
                        <li><a href="https://laravel.com/docs/queues">Job Queues</a></li>
                        <li><a href="https://laravel.com/docs/horizon">Laravel Horizon</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">
            <div>
                <div name="scheduling" title="Task Scheduling" icon="clock">
                    <p>Schedule recurring jobs and commands with an expressive syntax and say goodbye to complicated
                       configuration files:</p>

                    <pre><code language="php">
            $schedule->job(NotifySubscribers::class)->hourly();
        </code></pre>

                    <p>Laravel's scheduler can even handle multiple servers and offers built-in overlap prevention:</p>

                    <pre><code language="php">
            $schedule->job(NotifySubscribers::class)
                ->dailyAt('9:00')
                ->onOneServer();
                ->withoutOverlapping();
        </code></pre>

                    <p><a href="https://laravel.com/docs/scheduling">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">

            <div>
                <div name="testing" title="Testing" icon="command-line">
                    <p>Laravel is built for testing. From unit tests to browser tests, you’ll feel more confident in
                       deploying your application:</p>

                    <pre><code language="php">
            $user = User::factory()->create();

            $this->browse(fn (Browser $browser) => $browser
                ->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home')
                ->assertSee("Welcome {$user->name}")
            );
        </code></pre>

                    <p><a href="https://laravel.com/docs/testing">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-5 mx-auto">
        <div class="bg-body-tertiary p-5 rounded-5 shadow">
            <div>
                <div name="events" title="Events & WebSockets" icon="arrows-right-left">
                    <p>Laravel's events allow you to send and listen for events across your application, and listeners
                       can easily be dispatched to a background queue:</p>

                    <pre><code language="php">
            OrderShipped::dispatch($order);
        </code></pre>

                    <pre><code language="php">
            class SendShipmentNotification implements ShouldQueue
            {
                public function handle(OrderShipped $event): void
                {
                    // ...
                }
            }
        </code></pre>

                    <p>Your frontend application can even subscribe to your Laravel events using <a
                            href="https://laravel.com/docs/broadcasting">Laravel Echo</a> and WebSockets, allowing you
                       to build real-time, dynamic applications:</p>

                    <pre><code language="javascript">
            Echo.private(`orders.${orderId}`)
                .listen('OrderShipped', (e) => {
                    console.log(e.order);
                });
        </code></pre>

                    <p><a href="https://laravel.com/docs/events">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Web</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>
            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">

                    <div class="mb-4">
                        <p>
                            Laravel - это по-настоящему мощный фреймворк для разработки веб-приложений. Он
                            пользуется широкой популярностью благодаря своей простоте и элегантности кода. Множество
                            успешных веб-проектов, включая платформу Medium и онлайн-рынок Etsy, используют Laravel в
                            качестве основы. Он предлагает гибкую систему маршрутизации, ORM для работы с базой данных,
                            шаблонизатор Blade для удобного отображения данных и другие функциональные возможности.
                            Laravel имеет активное сообщество разработчиков и обновляется регулярно, что обеспечивает
                            его стабильность и развитие.
                        </p>
                    </div>


                    <pre class="rounded-3 position-relative bg-dark p-4 text-white shadow language-php mb-4" tabindex="0"><code
                                class="language-php">Route::post('/task', function (Request $request) {

     $request-&gt;validate([
        'name' =&gt; 'required|max:255',
     ])

    $task = new Task;
    $task-&gt;name = $request-&gt;name;
    $task-&gt;save();

    return redirect('/');
});
</code></pre>


                    <div class="mb-4">
                        <h5>Крутой Шаблонизатор Blade</h5>

                        <p class="pe-5">
                            Laravel Blade — мощный шаблонизатор. Он не ограничивает использование кодов PHP, как это
                            делают другие шаблоны. Он не только самый популярный в использовании, но и самый гибкий. Он
                            обрабатывается быстрее, поскольку Laravel улавливает соответствующие представления.
                        </p>
                    </div>

                    <h5>Используйте технологию JavaScript, которую вы предпочитаете.</h5>

                    <div class="bg-body p-3 rounded-3 mb-3 pe-none">
                        <div class="row align-items-center">
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/angular.svg">
                            </div>
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/react.svg">
                            </div>
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/vuejs.svg">
                            </div>
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/ember.svg">
                            </div>
                            <div class="col-8 col-sm-5 col-md-2 m-auto">
                                <img alt="image" class="img-fluid" src="/img/logos/svelte.svg">
                            </div>
                        </div>
                    </div>

                    Мы не делаем предположений относительно JS Frameworks, которые вы предпочитаете использовать. Вот почему
                    мы разработали Ionic для полной интеграции со всеми лучшими интерфейсными фреймворками, включая Angular,
                    React, Vue или даже без фреймворка.

                    <p class="pe-5">
                        Рассказать о React, Angular или Vue
                        Встроенная поддержка сборки ресурсов через Webpack/Vite или использование вообще без какой-либо
                        сборки.
                    </p>


                    <p>Authenticating users is as simple as adding an authentication middleware to your Laravel route
                       definition:</p>

                    <pre class="rounded-3 position-relative bg-dark p-4 text-white shadow language-php mb-4" tabindex="0"><code
                            class="language-php">Route::get('/profile', ProfileController::class)
    ->middleware('auth');
</code></pre>


                    <p>Once the user is authenticated, you can access the authenticated user via the <code>Auth</code>
                       facade:</p>

                    <pre class="rounded-3 position-relative bg-dark p-4 text-white shadow language-php mb-4" tabindex="0"><code
                            class="language-php">use Illuminate\Support\Facades\Auth;

// Get the currently authenticated user...
$user = Auth::user();
</code></pre>

                    <p>Of course, you may define your own authentication middleware, allowing you to customize the
                       authentication process.</p>

                    <p>For more information on Laravel's authentication features, check out the <a
                            href="https://laravel.com/docs/authentication">authentication documentation</a>.</p>

                </div>
            </div>



        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">API</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">
                    <p>
                        Laravel - отличный выбор, если вам нужно создать мощное и функциональное API. Он
                        предоставляет вам все необходимые инструменты и решения для разработки RESTful API. С
                        помощью механизма маршрутизации Laravel вы можете легко определить точки входа и создать
                        простые и понятные эндпоинты для вашего API. Встроенная сериализация данных позволяет легко
                        форматировать данные для передачи в формате JSON или других форматах. Кроме того, Laravel
                        имеет встроенную систему аутентификации, которая делает добавление безопасности в ваше API
                        очень простым. Laravel Passport позволяет вам создавать токены доступа для аутентификации
                        пользователей и защиты доступа к вашему API. Это делает Laravel идеальным инструментом для
                        создания надежных и защищенных серверных API.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Реактивные</h5>
                <p class="mb-0">Хотите создавать полнофункциональные веб-приложения без необходимости активного
                    использования JavaScript?</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">

                    <p>
                        Хотите создавать полнофункциональные веб-приложения без необходимости активного
                        использования JavaScript? Laravel Livewire и Hotwire - вот что вам нужно. Livewire позволяет
                        вам создавать интерактивные компоненты, используя только серверный код PHP. Он автоматически
                        обрабатывает динамическое взаимодействие и обновление данных посредством AJAX без
                        необходимости писать JavaScript-код. Hotwire в свою очередь обеспечивает эффективную
                        передачу данных между клиентскими и серверными компонентами, позволяя разрабатывать
                        отзывчивые и интерактивные интерфейсы. Вместе они обеспечивают удобное и продуктивное
                        разработку без традиционных сложностей фронтенда. Laravel Livewire/Hotwire - это лучшее
                        решение для создания полнофункциональных веб-приложений с минимальным использованием
                        JavaScript.
                    </p>

                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2 fw-semibold">Интранет</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">
                    <p>
                        Управление административной панелью может быть утомительной задачей, но не с Laravel Orchid.
                        Этот пакет инструментов значительно упрощает процесс разработки административных панелей в
                        Laravel-приложениях. С помощью Laravel Orchid вы можете быстро создавать красивые и
                        функциональные разделы, формы и таблицы с минимальным написанием кода. Он автоматически
                        генерирует административный интерфейс на основе ваших моделей, что позволяет вам
                        сосредоточиться на разработке функциональности, а не на создании пользовательского
                        интерфейса. Orchid также предоставляет настраиваемые роли и права доступа, что позволяет вам
                        легко определить уровень доступа для разных пользователей. Благодаря Laravel Orchid
                        управление административными задачами в Laravel становится простым и эффективным.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <div
                        class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                        <x-icon path="bs.terminal" />
                    </div>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Консоль</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <x-icon path="bs.terminal" />
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Отслеживание и регистрация событий </h4>
                        <p class="text-body-secondary">
                            Вся информацию о событиях, происходящих в вашем приложении. Будь то отправка электронной почты,
                            записи в журнале или
                            какие-либо другие события, Telescope фиксирует их и дает вам возможность легко просмотреть и
                            проанализировать.
                        </p>
                    </div>

                    <p>
                        Управление административной панелью может быть утомительной задачей, но не с Laravel Orchid.
                        Этот пакет инструментов значительно упрощает процесс разработки административных панелей в
                        Laravel-приложениях. С помощью Laravel Orchid вы можете быстро создавать красивые и
                        функциональные разделы, формы и таблицы с минимальным написанием кода. Он автоматически
                        генерирует административный интерфейс на основе ваших моделей, что позволяет вам
                        сосредоточиться на разработке функциональности, а не на создании пользовательского
                        интерфейса. Orchid также предоставляет настраиваемые роли и права доступа, что позволяет вам
                        легко определить уровень доступа для разных пользователей. Благодаря Laravel Orchid
                        управление административными задачами в Laravel становится простым и эффективным.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center align-items-start position-relative mb-5">
            <div class="col-xl-4 position-sticky top-0 py-3">
                <div class="mb-4">
                    <svg width="56" class="border border-danger" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="6" fill="#dc35450"></rect>
                        <path d="M20 35.5C20 34.837 20.2634 34.2011 20.7322 33.7322C21.2011 33.2634 21.837 33 22.5 33H36"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M22.5 18H36V38H22.5C21.837 38 21.2011 37.7366 20.7322 37.2678C20.2634 36.7989 20 36.163 20 35.5V20.5C20 19.837 20.2634 19.2011 20.7322 18.7322C21.2011 18.2634 21.837 18 22.5 18V18Z"
                            stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <h5 class="fs-4 mt-2  fw-semibold">Настольные приложение</h5>
                <p class="mb-0">Элегантная и эффективная система роутинга для реализации любых адресов в
                    приложении.</p>
            </div>

            <div class="col-xl-8">
                <div class="bg-body-tertiary p-5 rounded-5 shadow">
                    <p>
                        Управление административной панелью может быть утомительной задачей, но не с Laravel Orchid.
                        Этот пакет инструментов значительно упрощает процесс разработки административных панелей в
                        Laravel-приложениях. С помощью Laravel Orchid вы можете быстро создавать красивые и
                        функциональные разделы, формы и таблицы с минимальным написанием кода. Он автоматически
                        генерирует административный интерфейс на основе ваших моделей, что позволяет вам
                        сосредоточиться на разработке функциональности, а не на создании пользовательского
                        интерфейса. Orchid также предоставляет настраиваемые роли и права доступа, что позволяет вам
                        легко определить уровень доступа для разных пользователей. Благодаря Laravel Orchid
                        управление административными задачами в Laravel становится простым и эффективным.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <x-call-to-action link="{{ route('docs') }}" text="Посмотреть документацию">
        <x-slot:title>Мы лишь прикоснулись к поверхности.</x-slot>

        <x-slot:description>
            В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
            ограничение скорости и пользовательские консольные команды.
        </x-slot>
    </x-call-to-action>
@endsection
