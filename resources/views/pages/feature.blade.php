@extends('layout')
@section('title', "Возможности")

@section('content')
    <x-header image="/img/sign.svg">
        <x-slot:sup>Всё что нужно для достижения цели</x-slot>
        <x-slot:title>Одна платформа, множество путей.</x-slot>

        <x-slot:description>
            «Из коробки» Laravel предлагает элегантные решения для множества функций, необходимых всем современным
            приложениям. Пришло время создавать их!
        </x-slot>

        <x-slot:actions>
            <a href="{{route('docs')}}" class="btn btn-primary btn-lg px-4">Для разработчика</a>

            <a href="{{ route('courses') }}"
               class="link-body-emphasis text-decoration-none link-icon-animation">Курсы для новичков
                <x-icon path="bs.arrow-right" />
            </a>
        </x-slot>

    </x-header>

    <x-container data-controller="prism">
        <section class="mb-5 pb-md-5">
            <div class="bg-body-tertiary p-4 p-xxl-5 rounded position-relative"
                 data-controller="tabs"
                 data-tabs-active-tab-class="bg-body-secondary"
                 data-tabs-index-value="1"
            >
                <div class="row d-flex mb-4 align-items-baseline">
                    <li class="col d-flex flex-column flex-lg-row gap-3 gap-lg-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start" id="first" data-tabs-target="tab" data-action="click->tabs#change:prevent">
                        <x-icon path="i.inertia" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
                        <a href="#"
                           class="text-body-secondary text-decoration-none"
                           data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                            <h5 class="mb-0">Inertia</h5>
                            <small class="opacity-50 d-none d-lg-block">Усовершенствуйте Laravel с помощью React, Vue или Svelte</small>
                        </a>
                    </li>
                    <li class="col d-flex flex-column flex-lg-row gap-3 gap-lg-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start" id="second" data-tabs-target="tab" data-action="click->tabs#change:prevent">
                        <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
                        <a href="#"
                           class="text-body-secondary text-decoration-none"
                           data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                            <h5 class="mb-0">Livewire</h5>
                            <small class="opacity-50 d-none d-lg-block">Реактивные шаблоны, построенные с помощью PHP</small>
                        </a>
                    </li>
                    <li class="col d-flex flex-column flex-lg-row gap-3 gap-lg-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start" id="third" data-tabs-target="tab" data-action="click->tabs#change:prevent">
                        <x-icon path="i.spa" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
                        <a href="#"
                           class="text-body-secondary text-decoration-none"
                           data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                            <h5 class="mb-0">API</h5>
                            <small class="opacity-50 d-none d-lg-block">Создавайте мощные API быстрее, чем когда-либо</small>
                        </a>
                    </li>
                </div>


                <div class="">
                    <div class="d-none" data-tabs-target="panel">
                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Laravel Inertia</h4>
                                занимается маршрутизацией и передачей данных между серверной частью
                                и внешним интерфейсом Laravel — нет необходимости создавать API или
                                поддерживать два набора маршрутов. Легко
                                передавайте данные из вашей базы данных непосредственно в реквизиты
                                компонентов вашей внешней страницы,
                                используя все функции Laravel под рукой в ​​одном фантастическом
                                монорепозитории.
                            </div>
                            <div class="col-12 col-lg-8">


                                <pre class="rounded-3 my-0">
                                 <x-highlight language="php">
                                    class UserController {
                                    public function index() {
                                    $users = User::active()
                                    ->orderByName()
                                    ->get([ 'id', 'name', 'email' ]);

                                    return Inertia::render('Users', [
                                    'users' = > $users,
                                    ]);
                                    }
                                    }
                                </x-highlight>
                                </pre>
                                <pre class="rounded-3 my-0"><code language="js">
        import Layout from './Layout'

            export default function Users({users }) {
          return (
              <Layout>{users.map(user = > (<Link href={route('users.show', user)}> {
                user.name
              }({user.email}) < / Link >))}</Layout>)
        }
                                </code></pre>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6">
                                <p>Inertia дает вам опыт разработчика и простоту создания многостраничного приложения,
                                   отображаемого на сервере, с пользовательским интерфейсом и оперативностью JavaScript
                                   SPA.</p>

                                <p>Ваши внешние компоненты могут сосредоточиться на взаимодействии с пользователем, а не на
                                   вызовах API и манипулировании данными — больше не нужно вручную запускать HTTP-запросы и
                                   манипулировать ответами.
                                </p>
                                <p class="mb-0">Inertia даже предлагает рендеринг на стороне сервера при начальной загрузке
                                                страницы для
                                                приложений, которые получают выгоду от поисковой оптимизации.
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-4 border rounded">
                                    <h6 class="fw-bolder">Как это работает?</h6>

                                    <p>Первоначальная загрузка страницы вашего приложения вернет SPA на базе Inertia и
                                       реквизиты
                                       страницы в одном запросе. Последующие запросы от нажатия ссылок или отправки форм
                                       будут
                                       автоматически возвращать только те реквизиты страницы, которые необходимы.</p>

                                    <p class="mb-0">Когда вы развертываете новые ресурсы, Inertia автоматически выполнит
                                                    следующий запрос при полной
                                                    загрузке страницы, поэтому ваши пользователи будут иметь самые последние
                                                    ресурсы, не теряя ни
                                                    секунды.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-tabs-target="panel">


                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Livewire</h4>
                                Livewire is a modern way to build dynamic interfaces using server-rendered templates instead
                                of a JavaScript framework. It combines the simplicity and speed of building a
                                server-rendered application with the user experience of a JavaScript SPA. You have to see it
                                to believe it.
                            </div>
                            <div class="col-12 col-lg-8">
                                <pre class="rounded-3 my-0"><code language="php">
    use Livewire\Component;

    class Search extends Component
    {
        public $search = '';

        public function render()
        {
            $users = User::search($this->search)->get();

            return view('livewire.search', [
                'users' => $users,
            ]);
        }
    }
                                </code></pre>
                                <pre class="rounded-3 my-0">
                                    <code language="js">
                                        @verbatim
    <div>
        <input wire:model="search"
               type="text"
               placeholder="Search users..." />

        <ul>
            @foreach ($users as $user)
                <li>{{ $user->username }}</li>
            @endforeach
        </ul>
    </div>
                                        @endverbatim
                                </code></pre>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6">
                                <p>When using Livewire, you won't need JavaScript to manage the DOM or state - you'll just
                                   sprinkle it in for some thoughtful interactions. Alpine.js is the perfect light-weight
                                   JavaScript library to pair with your Livewire application.</p>

                                <p class="mb-0">As the state of your Livewire component changes, your frontend will automatically be
                                   updated. But, Livewire doesn't stop there. Support for real-time validation, event
                                   handling, file downloads, authorization and more is included.
                                </p>

                                <p class="mb-0">
                                    Learn more
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-4 border rounded">
                                    <h6 class="fw-bolder">Как это работает?</h6>

                                    <p class="mb-0">Livewire renders your HTML on the server using the Blade templating language. It
                                       automatically adds the JavaScript required to make the page reactive, and
                                       automatically re-renders components and updates the DOM as data changes.</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="d-none" data-tabs-target="panel">

                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Не нужен фронтенд? Нет проблем.</h4>
                                Laravel - идеальное бэкенд API для ваших JavaScript SPA и мобильных приложений. Вы
                                получите доступ ко всем функциям Laravel, сохраняя рабочий процесс разработки фронтенда,
                                к которому вы привыкли.
                            </div>
                            <div class="col-12 col-lg-8">
                                <pre class="rounded-3 my-0"><code language="php">
    class UserController
    {
        public function index()
        {
            return User::active()
                ->orderByName()
                ->paginate(25, ['id', 'name', 'email']);
        }
    }
                                </code></pre>
                                <pre class="rounded-3 my-0">
                                    <code language="js">
                                        @verbatim
    {
    "data": [
        {
        "id": 1,
        "name": "Taylor Otwell",
        "email": "taylor@laravel.com",
        },
        // ...
        ],
        "from": 1,
        "to": 25,
        "total": 50,
        "per_page": 25,
        "current_page": 1,
        "last_page": 2,
        "first_page_url": "https://api.laravel.app/users?page=1",
        "last_page_url": "https://api.laravel.app/users?page=2",
        "next_page_url": "https://api.laravel.app/users?page=2",
        "prev_page_url": null,
        "path": "https://api.laravel.app/users",
    }
                                        @endverbatim
                                </code></pre>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6">
                                <p>
                                    Для аутентификации вы можете использовать надежную аутентификацию на основе куки в
                                    Laravel. Или вы можете использовать Laravel Sanctum или Laravel Passport, если вы
                                    разрабатываете мобильное приложение или ваш фронтенд размещен отдельно от бэкенд
                                    API.
                                </p>
                                <p class="mb-0">
                                    Если ваше API работает в условиях больших нагрузок, сочетайте ваше приложение
                                    Laravel с Laravel Octane и Laravel Vapor, чтобы обрабатывать ваш трафик без проблем.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="mb-5 pb-md-5">
            <div class="row">
            <div class="col-lg-6 my-5">
                <h2 class="display-5 fw-semibold mb-4 text-balance">
                    Погрузитесь прямо со старта.
                </h2>
                <p class="fw-normal mb-4 mb-lg-5 text-balance">
                    Независимо от того, предпочитаете ли вы Livewire или React,
                    стартовые наборы Laravel позволят вам сразу же приступить к
                    делу. За считанные минуты вы можете получить
                    полнофункциональное приложение, сочетающее Laravel и Tailwind с
                    выбранным вами интерфейсом.
                </p>
            </div>

                <div class="col-lg-6">
                    <img src="/img/ui/puzzle.svg" class="img-fluid d-none d-lg-block mx-auto">
                </div>

            </div>
            <div class="bg-body-tertiary rounded overflow-hidden">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="p-5 d-flex flex-column gap-4">
                            <div class="w-75">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 272 48" class="h-12 max-w-full"
                                     role="image">
                                    <title>Laravel Breeze</title>
                                    <circle fill="#fcbf24" cx="24" cy="24" r="24"></circle>
                                    <path fill="#d97707"
                                          d="M11.979 24l12.021-12.021 12.021 12.021-12.021 12.021z"></path>
                                    <path fill="#fef3c7"
                                          d="M41 7l-17 17v-12l5-5h12zm-17 17l17 17v-12l-5-5h-12zm-5 17l5-5v-12l-17 17h12zm-12-22l5 5h12l-17-17v12z"></path>
                                    <path
                                        d="M74.1 30.7h8v3.9h-12.1v-20.7h4.1v16.8zm21.2-10.9h3.9v14.8h-3.9v-1.7c-1.1 1.3-2.7 2.2-4.9 2.2-4 0-7.3-3.4-7.3-7.8s3.3-7.8 7.3-7.8c2.2 0 3.8.8 4.9 2.2v-1.9zm0 7.4c0-2.5-1.8-4.2-4.2-4.2-2.4 0-4.1 1.7-4.1 4.2s1.8 4.2 4.1 4.2c2.5 0 4.2-1.7 4.2-4.2zm11.2-4.9v-2.5h-3.9v14.8h3.9v-7.1c0-3.1 2.5-4 4.5-3.8v-4.3c-1.8.1-3.7.9-4.5 2.9zm17.6-2.5h3.9v14.8h-3.9v-1.7c-1.1 1.3-2.7 2.2-4.9 2.2-4 0-7.3-3.4-7.3-7.8s3.3-7.8 7.3-7.8c2.2 0 3.8.8 4.9 2.2v-1.9zm0 7.4c0-2.5-1.8-4.2-4.2-4.2-2.4 0-4.1 1.7-4.1 4.2s1.8 4.2 4.1 4.2c2.4 0 4.2-1.7 4.2-4.2zm13.5 3l-3.6-10.4h-4.2l5.7 14.8h4.4l5.7-14.8h-4.2l-3.8 10.4zm23.9-3c0 .6-.1 1.1-.1 1.6h-11.4c.5 2 2.2 2.8 4.2 2.8 1.5 0 2.7-.6 3.3-1.5l3.1 1.8c-1.4 2-3.6 3.2-6.5 3.2-5 0-8.2-3.4-8.2-7.8s3.2-7.8 7.9-7.8c4.5-.1 7.7 3.3 7.7 7.7zm-3.9-1.4c-.5-2.1-2.1-3-3.7-3-2.1 0-3.5 1.1-3.9 3h7.6zm6.5-12.8v21.6h3.9v-21.6h-3.9zM192.7 23.9c1.1-.4 1.9-1 2.5-1.8.6-.8.9-1.8.9-2.9 0-1.8-.6-3.1-1.8-4-1.2-.9-2.9-1.4-5-1.4h-8.3v20.8h8.5c2.2 0 4-.5 5.2-1.5 1.2-1 1.8-2.4 1.8-4.2 0-1.3-.3-2.4-1-3.3-.7-.8-1.6-1.4-2.8-1.7zm-9.9-8.6h6.1c3.5 0 5.2 1.3 5.2 3.9 0 1.3-.4 2.3-1.3 3-.9.7-2.2 1-3.9 1h-6.1v-7.9zm10.6 16.7c-.8.7-2.2 1-4 1h-6.6v-8.2h6.6c3.5 0 5.2 1.4 5.2 4.2 0 1.4-.4 2.4-1.2 3zm14-12.4c.5 0 .9 0 1.3.1l-.1 1.6c-.4-.1-.8-.1-1.4-.1-1.5 0-2.6.5-3.4 1.4-.7.9-1.1 2.1-1.1 3.4v8.6h-1.7v-10.6c0-1.5-.1-2.9-.2-4.1h1.7l.2 2.7c.4-1 1-1.8 1.8-2.3s1.8-.7 2.9-.7zm9.7 0c-1.4 0-2.6.3-3.6.9-1.1.6-1.9 1.5-2.5 2.7-.6 1.2-.9 2.5-.9 4 0 2.4.7 4.2 2 5.5s3.1 2 5.4 2c1.1 0 2.1-.2 3.1-.5 1-.4 1.9-.8 2.5-1.4l-.7-1.4c-1.5 1.2-3.1 1.8-4.9 1.8-1.8 0-3.1-.5-4.1-1.6-.9-1-1.4-2.5-1.4-4.5v-.1h11.4v-.4c0-2.2-.6-4-1.7-5.2-1-1.2-2.6-1.8-4.6-1.8zm-4.9 6.1c.2-1.5.8-2.6 1.6-3.4.9-.8 2-1.2 3.4-1.2s2.4.4 3.2 1.2c.8.8 1.2 1.9 1.3 3.4h-9.5zm21.2-6.1c-1.4 0-2.6.3-3.6.9-1.1.6-1.9 1.5-2.5 2.7-.6 1.2-.9 2.5-.9 4 0 2.4.7 4.2 2 5.5s3.1 2 5.4 2c1.1 0 2.1-.2 3.1-.5 1-.4 1.9-.8 2.5-1.4l-.7-1.4c-1.5 1.2-3.1 1.8-4.9 1.8-1.8 0-3.1-.5-4.1-1.6-.9-1-1.4-2.5-1.4-4.5v-.1h11.4v-.4c0-2.2-.6-4-1.7-5.2-1.1-1.2-2.6-1.8-4.6-1.8zm-5 6.1c.2-1.5.8-2.6 1.6-3.4.9-.8 2-1.2 3.4-1.2s2.4.4 3.2 1.2c.8.8 1.2 1.9 1.3 3.4h-9.5zm16.5 7.4h10.2v1.5h-12.5v-1.2l10-12h-9.6v-1.4h11.8v1.3l-9.9 11.8zm26.1-6v-.4c0-2.2-.6-4-1.7-5.2-1.1-1.2-2.6-1.9-4.6-1.9-1.4 0-2.6.3-3.6.9-1.1.6-1.9 1.5-2.5 2.7-.6 1.2-.9 2.5-.9 4 0 2.4.7 4.2 2 5.5s3.1 2 5.4 2c1.1 0 2.1-.2 3.1-.5 1-.4 1.9-.8 2.5-1.4l-.7-1.4c-1.5 1.2-3.1 1.8-4.9 1.8-1.8 0-3.1-.5-4.1-1.6-.9-1-1.4-2.5-1.4-4.5v-.1h11.4zm-9.6-4.8c.9-.8 2-1.2 3.4-1.2s2.4.4 3.2 1.2c.8.8 1.2 1.9 1.3 3.4h-9.5c.2-1.5.7-2.6 1.6-3.4z"
                                        class="fill-gray-900"></path>
                                </svg>
                            </div>

                            <p class="mb-0">Laravel Breeze — это легкий стартовый комплект, который включает в себя шаблоны
                               управления
                               профилями пользователей для аутентификации в стиле Tailwind.</p>

                            <ul>
                                <li>Регистрация пользователя и вход в систему</li>
                                <li>Сброс пароля</li>
                                <li>Подтверждение адреса электронной почты</li>
                                <li>Управление профилями пользователей</li>
                                <li>Blade или Inertia (с Vue или React)</li>
                                <li>Дополнительная поддержка TypeScript</li>
                                <li>Дополнительная поддержка темного режима</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 overflow-hidden">
                        <img src="https://laravel.com/img/frontend/breeze-profile.png" class="mt-5 rounded-top-4 border-top border-start"
                             height="600px"/>
                    </div>
                </div>
                <div class="opacity-50">
                <hr class="mt-0">
                </div>

                <div class="p-5">
                    <div class="row align-items-start">
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <div class="bg-body-secondary rounded p-4">
                            <p class="mb-0 opacity-75">
                                Настраивать окружение для новичка может быть непростой задачей.
                                Однако, есть несколько простых и удобных способов быстро и легко
                                запустить Laravel и сосредоточиться на разработке приложения.
                            </p>
                        </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <div class="d-flex flex-column gap-4">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="/img/ui/apple.svg" class="img-fluid">
                                    <h4 class="fw-semibold mb-0 text-body-emphasis">Laravel для Mac</h4>
                                </div>
                                <p class="mb-0">
                                    Laravel Valet предоставляет простой и минималистичный
                                    способ настройки вашей среды разработки для
                                    запуска приложений, а также обеспечивает доступ к ним через <code>*.test</code>
                                    домен.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <div class="d-flex flex-column gap-4">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="/img/ui/docker.svg" class="img-fluid">
                                    <h4 class="fw-semibold mb-0 text-body-emphasis">Laravel для Docker</h4>
                                </div>
                                <p class="mb-0">
                                    Если вам нужна гибкость и изоляция, Laravel Sail предоставляет легкий
                                    интерфейс командной строки для работы с Docker. Даже если у вас нет опыта работы с
                                    Docker.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-container>


    <div class="bg-dark-subtle text-white py-5" style="background-image: url('/img/bg-packages.svg')" data-bs-theme="dark">
        <x-container>
            <div class="col-12">
                <div class="row g-4 g-md-5 py-5 row-cols-1 row-cols-lg-2">
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <x-icon path="i.route" width="2.5rem" height="2.5rem" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Маршрутизация</h4>
                            <p class="opacity-75 small mb-0">
                                Маршрутизация (Routing) позволяет определить, как приложение должно отвечать на разные
                                URL-адреса. Это позволяет легко настраивать маршруты для обработки запросов и
                                определять, какие действия и контроллеры должны быть вызваны при поступлении запроса.
                            </p>
                            <a href="{{ route('packages') }}"
                               class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                                Подробнее
                                <x-icon path="bs.arrow-right" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <x-icon path="i.blade" width="2.5rem" height="2.5rem" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Шаблоны Blade</h4>
                            <p class="opacity-75 small mb-0">
                                Вставляйте переменные, используйте условия, циклы и другие
                                операции в шаблонах, что делает их более читабельными и удобными для разработки.
                            </p>
                            <a href="{{ route('packages') }}"
                               class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                                Подробнее
                                <x-icon path="bs.arrow-right" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <x-icon path="i.authentication" width="2.5rem" height="2.5rem" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Authentication</h4>
                            <p class="opacity-75 small mb-0">
                                Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another sentence and probably just keep going until we run out of words.
                            </p>
                            <a href="{{ route('packages') }}"
                               class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                                Подробнее
                                <x-icon path="bs.arrow-right" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <x-icon path="i.authorization" width="2.5rem" height="2.5rem" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Authorization</h4>
                            <p class="opacity-75 small mb-0">
                                Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another sentence and probably just keep going until we run out of words.
                            </p>
                            <a href="{{ route('packages') }}"
                               class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                                Подробнее
                                <x-icon path="bs.arrow-right" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <x-icon path="i.terminal" width="2.5rem" height="2.5rem" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Artisan Console</h4>
                            <p class="opacity-75 small mb-0">
                                Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another sentence and probably just keep going until we run out of words.
                            </p>
                            <a href="{{ route('packages') }}"
                               class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                                Подробнее
                                <x-icon path="bs.arrow-right" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <x-icon path="i.tests" width="2.5rem" height="2.5rem" />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Testing</h4>
                            <p class="opacity-75 small mb-0">
                                Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another sentence and probably just keep going until we run out of words.
                            </p>
                            <a href="{{ route('packages') }}"
                               class="link-body-emphasis fw-semibold text-decoration-none link-icon-animation">
                                Подробнее
                                <x-icon path="bs.arrow-right" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </div>


    <x-container data-controller="prism">

        <section class="pb-md-5 mb-5">

            <div class="row g-4 g-md-5">
                <div class="col-lg-6 mb-5">
                    <h2 class="display-5 fw-semibold mb-4 text-balance">Удобная работа с данными</h2>
                    <p class="fw-normal mb-4 mb-lg-5 text-balance">
                        Laravel имеет мощные инструменты для работы с базами данных.
                        Он поддерживает широкий спектр СУБД, включая MySQL, MariaDB, PostgreSQL, SQL Server и SQLite.

                        Вот несколько ключевых возможностей для работы с базой данных в Laravel:
                    </p>

                    <div class="bg-body-tertiary p-5 rounded d-flex flex-column gap-4">
                        <h4 class="fw-bold">Eloquent ORM</h4>
                        <p class="mb-0">Не бойтесь работать с базами данных! ORM (Object-Relational Mapping) в Laravel - Eloquent
                           ORM, позволяет легко взаимодействовать с данными вашего приложения. Создание моделей,
                           миграций и отношений между ними происходит в несколько простых шагов:</p>

                        <pre><code language="text">php artisan make:model Invoice --migration</code></pre>

                        <p class="mb-0">После определения структуры модели и ее отношений, можно легко взаимодействовать с базой
                           данных, используя мощный и выразительный синтаксис Eloquent:</p>

                        <pre><code language="php">// Создание связанной модели ...
    $user->invoices()->create(['amount' => 100]);

    // Обновление модели ...
    $invoice->update(['amount' => 200]);

    // Получение моделей ...
    $invoices = Invoice::unpaid()
        ->where('amount', '>=', 100)
        ->get();

    // Удобный API для взаимодействия ...
    $invoices->each->pay();</code></pre>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="/img/ui/data.svg" class="img-fluid img-fluid d-none d-lg-block mx-auto">

                    <div class="bg-body-tertiary p-5 rounded d-flex flex-column gap-4">
                        <h4 class="fw-bold mb-0">Миграции базы данных</h4>

                        <p class="mb-0">Миграции в Laravel - это аналог контроля версий для вашей базы данных. Они позволяют вашей
                           команде определить и поделиться структурой вашей базы данных:</p>

                        <pre><code language="php">// Создание таблицы "flights"
    Schema::create('flights', ...);

    // Установите столбец primary ключа как UUID
    $table->uuid('id')->primary();

    // Установите ограничение внешнего ключа
    $table->foreignUuid('airline_id')
        ->constrained();

    // Добавьте столбец для названия рейса
    $table->string('name');

    // Добавьте временные метки
    $table->timestamps();
    </code></pre>
                    </div>

                </div>
            </div>
        </section>


        <section class="mb-5 pb-md-5">
            <div class="row g-4 g-md-5">
                <div class="col-lg-6 mb-5">
                    <h2 class="display-5 fw-semibold mb-4 text-balance">Максимальная эффективность</h2>
                    <p class="fw-normal mb-4 mb-lg-5 text-balance">
                        Позвольте своему приложению работать с максимальной эффективностью благодаря очередям в Laravel.
                        Независимо от того, нужно ли обрабатывать длительные задачи, отправлять уведомления или обновлять
                        данные, очереди позволят вам добиться максимальной пропускной способности и отзывчивости в вашем
                        приложении.
                    </p>

                    <div class="bg-body-tertiary p-5 rounded d-flex flex-column gap-4">
                        <h4 class="fw-bold">Job Queues</h4>
                        <p class="mb-0">Очереди работ (Job Queues) в Laravel позволяют вам перенести медленные задачи в фоновую
                           очередь, что помогает поддерживать отзывчивость веб-запросов. Пример использования:</p>

                        <pre><code language="php">
$podcast = Podcast::create(/* ... */);

ProcessPodcast::dispatch($podcast)
    ->onQueue('podcasts');
        </code></pre>

                        <p class="mb-0">Вы можете запускать столько рабочих процессов очередей, сколько необходимо, чтобы обработать
                           вашу нагрузку:</p>

                        <pre><code language="bash">
php artisan queue:work redis --queue=podcasts
        </code></pre>
                    </div>
            </div>
                <div class="col-lg-6">
                    <img src="/img/ui/crane.svg" class="img-fluid img-fluid d-none d-lg-block mx-auto">

                    <div class="bg-body-tertiary rounded">
                        <img src="https://laravel.com/img/docs/horizon-example.png" class="img-fluid">

                        <div class="d-flex flex-column gap-4 px-5 pb-5 pt-3">
                            <h4 class="fw-bold">Horizon</h4>
                            <p>
                               Для более удобного контроля и отслеживания очередей в Laravel существует Laravel Horizon.
                               Horizon предоставляет красивую панель управления и конфигурацию через код для ваших очередей,
                               работающих на Redis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </x-container>

{{--
    <x-container>

        <section class="row g-3 g-md-5 pb-md-5 mb-5 align-items-center">
            <div class="col-lg-6">
                <div
                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3  mb-3">
                    <x-icon path="bs.gear-fill" />
                </div>

                <h2 class="display-5 mb-3 fw-semibold lh-sm">Telescope</h2>
                <p class="lead fw-normal">
                    Обеспечивает понимание запросов, поступающих в ваше приложение, исключений, записей журнала,
                    запросов
                    к базе данных, заданий в очереди, почты, уведомлений, операций кэша, запланированных задач, дампов
                    переменных и многого другого.
                </p>
                <p class="d-flex justify-content-start lead fw-normal mb-md-0">
                    <a href="#" class="icon-link icon-link-hover fw-semibold">Прочитать документацию</a>
                </p>
            </div>
            <div class="col-lg-6">
                <img src="https://laravel.com/img/docs/telescope-example.png" class="img-fluid mt-3 mx-auto">
            </div>
        </section>

        <div class="row">
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
        </div>
    </x-container>

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
--}}

    <x-call-to-action link="{{ route('docs') }}" text="Посмотреть документацию">
        <x-slot:title>Мы лишь прикоснулись к поверхности.</x-slot>

        <x-slot:description>
            В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
            ограничение скорости и пользовательские консольные команды.
        </x-slot>
    </x-call-to-action>
@endsection
