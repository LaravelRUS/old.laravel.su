@extends('layout')
@section('title', "Возможности")

@section('content')
    <x-header image="/img/sign.svg">
        <x-slot:sup>Всё что нужно для достижения цели</x-slot>
        <x-slot:title>Одна платформа, множество путей.</x-slot>

        <x-slot:description>
            «Из коробки» Laravel предлагает элегантные решения для множества функций, необходимых всем современным
            приложениям. {{-- Пришло время создавать их! --}}
        </x-slot>

        <x-slot:actions>
            <a href="{{route('why-laravel')}}" class="btn btn-primary btn-lg px-4">Почему Laravel?</a>

            <a href="{{ route('courses') }}"
               class="d-none d-md-inline-flex link-body-emphasis text-decoration-none icon-link icon-link-hover">Обучение
                <x-icon path="i.arrow-right" class="bi" />
            </a>
        </x-slot>

    </x-header>

    <x-container data-controller="prism">
        <section class="mb-5 pb-md-5">
            <div class="bg-body-tertiary p-4 p-xl-5 rounded position-relative"
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
                            <small class="opacity-75 d-none d-lg-block">Усовершенствуйте Laravel с помощью React, Vue или Svelte</small>
                        </a>
                    </li>
                    <li class="col d-flex flex-column flex-lg-row gap-3 gap-lg-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start" id="second" data-tabs-target="tab" data-action="click->tabs#change:prevent">
                        <x-icon path="i.livewire" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
                        <a href="#"
                           class="text-body-secondary text-decoration-none"
                           data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                            <h5 class="mb-0">Livewire</h5>
                            <small class="opacity-75 d-none d-lg-block">Реактивные шаблоны, построенные с помощью PHP</small>
                        </a>
                    </li>
                    <li class="col d-flex flex-column flex-lg-row gap-3 gap-lg-4 rounded p-3 p-xxl-4 align-items-center align-items-lg-start" id="third" data-tabs-target="tab" data-action="click->tabs#change:prevent">
                        <x-icon path="i.spa" class="text-body-secondary flex-shrink-0" width="2rem" height="2rem"/>
                        <a href="#"
                           class="text-body-secondary text-decoration-none"
                           data-action="keydown.left->tabs#previousTab keydown.right->tabs#nextTab keydown.home->tabs#firstTab:prevent keydown.end->tabs#lastTab:prevent">
                            <h5 class="mb-0">API</h5>
                            <small class="opacity-75 d-none d-lg-block">Создавайте мощные API быстрее, чем когда-либо</small>
                        </a>
                    </li>
                </div>


                <div class="">
                    <div class="d-none" data-tabs-target="panel">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Inertia</h4>
                                <p>Занимается маршрутизацией и передачей данных между серверной частью
                                и внешним интерфейсом Laravel — нет необходимости создавать API или
                                поддерживать два набора маршрутов. Легко
                                передавайте данные из вашей базы данных непосредственно в реквизиты
                                компонентов вашей внешней страницы,
                                используя все функции Laravel под рукой в ​​одном фантастическом
                                монорепозитории.</p>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-lg-6">
       <pre class="rounded-3 my-0 h-100"><code language="js">
class UserController
{
    public function index()
    {
        $users = User::active()
            ->orderByName()
            ->get(['id', 'name', 'email']);

        return Inertia::render('Users', [
            'users' => $users,
        ]);
    }
}
           </code>
                                </pre>
                            </div>
                            <div class="col-12 col-lg-6">



                                <pre class="rounded-3 my-0 h-100"><code language="js">
import Layout from './Layout'

export default function Users({ users }) {
  return (
    <Layout>
      {users.map(user => (
        <Link href={route('users.show', user)}>
          {user.name} ({user.email})
        </Link>
      ))}
    </Layout>
  )
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
                                <p class="mb-lg-0">Inertia даже предлагает рендеринг на стороне сервера при начальной загрузке
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
                            <div class="col-lg-6">
                                <h4>Livewire</h4>
                                <p>Современный способ создания динамических интерфейсов с использованием
                                   серверных шаблонов вместо JavaScript-фреймворков. Он сочетает в себе простоту и
                                   быстроту разработки серверного приложения с пользовательским опытом JavaScript SPA
                                   (Single Page Application). Вам нужно увидеть это, чтобы поверить.</p>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-lg-6">
    <pre class="rounded-3 my-0 h-100"><code language="php">
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
                            </div>
                            <div class="col-12 col-lg-6">

@php
$livewireViewCode = <<<'HTML'
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
HTML;
@endphp

<!-- html комментарии, в которые обёрнут код ниже - часть синтаксиса плагина unescaped-markup,
не удалять, не добавлять пробелы или бругие символы между тогом code и комментарием -->
                            <pre class="rounded-3 my-0 h-100 language-markup" tabindex="0">

<code language="html" class="language-html">{{ \Illuminate\Support\Str::of($livewireViewCode)->trim() }}</code>
                            </pre>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6">
                                <p>
                                    При использовании Livewire вам не нужен JavaScript для управления DOM или состоянием
                                    - вы просто добавите его для некоторых продуманных взаимодействий. Alpine.js -
                                    идеальная легковесная JavaScript-библиотека для сочетания с вашим приложением на
                                    Livewire.
                                </p>

                                <p class="mb-lg-0">
                                    По мере изменения состояния вашего компонента Livewire, ваш фронтенд автоматически
                                    будет обновляться. Но Livewire не останавливается на этом. Поддержка реального
                                    времени для проверки данных, обработки событий, загрузки файлов, авторизации и
                                    многого другого включена.
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-4 border rounded">
                                    <h6 class="fw-bolder">Как это работает?</h6>

                                    <p class="mb-0">
                                        Livewire отрисовывает ваш HTML на сервере с использованием языка шаблонов Blade.
                                        Он автоматически добавляет необходимый JavaScript, чтобы страница стала
                                        реактивной, а также автоматически перерисовывает компоненты и обновляет DOM при
                                        изменении данных.
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="d-none" data-tabs-target="panel">

                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Не нужен фронтенд? Нет проблем.</h4>
                                <p>Laravel - идеальное бэкенд API для ваших JavaScript SPA и мобильных приложений. Вы
                                получите доступ ко всем функциям Laravel, сохраняя рабочий процесс разработки фронтенда,
                                к которому вы привыкли.</p>
                            </div>
                        </div>


                        <div class="row g-4">
                            <div class="col-lg-6">
                                <pre class="rounded-3 h-100 my-0"><code language="php">
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
                            </div>
                            <div class="col-12 col-lg-6">
                                <pre class="rounded-3 h-100 my-0">
                                    <code language="json">@verbatim
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
}@endverbatim</code></pre>
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
                            </div>
                            <div class="col-lg-6">
                            <p class="bg-body-secondary rounded p-4 mb-0">
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

                <div class="p-4 p-xl-5">
                    <div class="row align-items-start">
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <div class="bg-body-secondary rounded p-4">
                            <p class="mb-0 opacity-75">
                                Настраивать окружение для новичка может быть непростой задачей.
                                Однако, есть несколько простых и удобных способов быстро и легко
                                запустить Laravel и сосредоточиться на разработке приложения.
                            </p>
                        </div>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0">
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
                        <div class="col-lg-4 mb-4 mb-lg-0">
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
                            <img src="/icons/route.svg">
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Маршрутизация</h4>
                            <p class="opacity-75 small mb-0">
                                Маршрутизация (Routing) позволяет определить, как приложение должно отвечать на разные
                                URL-адреса. Это позволяет легко настраивать маршруты для обработки запросов и
                                определять, какие действия и контроллеры должны быть вызваны при поступлении запроса.
                            </p>
                            <a href="{{ route('docs',['page'=>'routing']) }}"
                               class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                                Подробнее
                                <x-icon path="i.arrow-right" class="bi" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <img src="/icons/blade.svg">
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Шаблоны Blade</h4>
                            <p class="opacity-75 small mb-0">
                                Вставляйте переменные, используйте условия, циклы и другие
                                операции в шаблонах, что делает их более читабельными и удобными для разработки.
                            </p>
                            <a href="{{ route('docs',['page'=>'blade']) }}"
                               class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                                Подробнее
                                <x-icon path="i.arrow-right" class="bi" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <img src="/icons/authentication.svg">
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Аутентификация</h4>
                            <p class="opacity-75 small mb-0">
                                Аутентификация (Authentication) в Laravel предоставляет простой и удобный способ
                                проверки подлинности пользователей. С помощью встроенных функций аутентификации вы
                                можете легко добавить систему регистрации, входа и выхода из системы на свой веб-сайт
                                Laravel.
                            </p>
                            <a href="{{ route('docs',['page'=>'authentication']) }}"
                               class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                                Подробнее
                                <x-icon path="i.arrow-right" class="bi" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <img src="/icons/authorization.svg">
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Авторизация</h4>
                            <p class="opacity-75 small mb-0">
                                Авторизация (Authorization) в Laravel позволяет контролировать доступ пользователей к
                                определенным ресурсам или действиям. Это позволяет легко определить, какие пользователи
                                имеют право выполнять определенные операции в вашем приложении.
                            </p>
                            <a href="{{ route('docs',['page'=>'authorization']) }}"
                               class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                                Подробнее
                                <x-icon path="i.arrow-right" class="bi" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <img src="/icons/terminal.svg">
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Artisan Console</h4>
                            <p class="opacity-75 small mb-0">
                                Вы можете создавать миграции, запускать тесты, управлять
                                базой данных, генерировать код и многое другое с помощью Artisan. Команды Artisan
                                упрощают разработку, улучшают производительность и помогают взаимодействовать с вашим
                                приложением Laravel из командной строки.
                            </p>
                            <a href="{{ route('docs',['page'=>'artisan']) }}"
                               class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                                Подробнее
                                <x-icon path="i.arrow-right" class="bi" /></a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="d-inline-flex align-items-center justify-content-center me-3">
                            <img src="/icons/tests.svg">
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="text-body-emphasis fw-bold mb-0">Тестирование</h4>
                            <p class="opacity-75 small mb-0">
                                Встроенная система тестирования Laravel, использующая PHPUnit, обеспечивает удобные инструменты для
                                создания и выполнения тестовых сценариев. Вы можете тестировать маршруты, контроллеры,
                                модели и другие компоненты вашего приложения, чтобы гарантировать их работоспособность и
                                соответствие ожиданиям.
                            </p>
                            <a href="{{ route('docs',['page'=>'testing']) }}"
                               class="link-body-emphasis fw-semibold text-decoration-none icon-link icon-link-hover">
                                Подробнее
                                <x-icon path="i.arrow-right" class="bi" /></a>
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

                    <div class="bg-body-tertiary p-4 p-xl-5 rounded d-flex flex-column gap-4">
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

                    <div class="bg-body-tertiary p-4 p-xl-5 rounded d-flex flex-column gap-4">
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

                    <div class="bg-body-tertiary p-4 p-xl-5 rounded d-flex flex-column gap-4">
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
                        <img src="/img/ecosystem/horizon.png" class="img-fluid rounded-top">

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


    <x-call-to-action link="{{ route('docs') }}" text="Посмотреть документацию">
        <x-slot:title>Мы лишь прикоснулись к поверхности.</x-slot>

        <x-slot:description>
            В Laravel есть все необходимое для создания веб-приложения, включая проверку электронной почты,
            ограничение скорости и пользовательские консольные команды.
        </x-slot>
    </x-call-to-action>
@endsection
