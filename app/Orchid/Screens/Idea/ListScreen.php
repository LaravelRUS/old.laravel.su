<?php

namespace App\Orchid\Screens\Idea;

use App\Models\IdeaKey;
use App\Models\IdeaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'ideaRequests' => IdeaRequest::with(['user', 'key'])
                ->defaultSort('created_at', 'desc')
                ->filters()
                ->paginate(),
            'metrics'      => [
                'unused_keys' => IdeaKey::where('activated', 0)->count(),
                'used_keys'   => IdeaKey::where('activated', 1)->count(),
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Запросы ключей';
    }

    /**
     * A description of the screen to be displayed in the header.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return '';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Добавить ключи')
                ->modal('addKeys')
                ->method('addKeys'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @throws \ReflectionException
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::metrics([
                'Выдано ключей:'          => 'metrics.used_keys',
                'Не использовано ключей:' => 'metrics.unused_keys',
            ]),

            Layout::table('ideaRequests', [

                TD::make(__('Actions'))
                    ->width(100)
                    ->render(fn (IdeaRequest $ideaRequest) => Link::make('Просмотр')
                        ->route('platform.idea.request', $ideaRequest->id)
                        ->icon('bs.pencil')),

                TD::make('Пользователь')
                    ->cantHide()
                    ->width(200)
                    ->render(fn (IdeaRequest $ideaRequest) => new Persona($ideaRequest->user->presenter())),

                /*
                TD::make('first_name','Имя')
                    ->width(150),
                TD::make('last_name','Фамилия')
                    ->width(150),

                TD::make('city','Город')
                    ->width(150),
                TD::make('email','email')
                    ->width(150),
                */

                TD::make('message', 'Сообщение')
                    ->alignLeft()
                    ->render(fn (IdeaRequest $ideaRequest) => Str::of($ideaRequest->message)->trim()->words(10))
                    ->width(300),

                TD::make('key', 'Статус')
                    ->align(TD::ALIGN_RIGHT)
                    ->render(function (IdeaRequest $ideaRequest) {
                        if ($ideaRequest->key()->exists()) {
                            return Blade::render('<x-icon path="bs.check" height="1.5em" width="1.5em" />');
                        }

                        return '—';
                    }),

                TD::make('created_at', __('Created'))
                    ->width(100)
                    ->usingComponent(DateTimeSplit::class)
                    ->align(TD::ALIGN_RIGHT)
                    ->defaultHidden()
                    ->sort(),

                TD::make('updated_at', 'Последнее обновление')
                    ->width(100)
                    ->usingComponent(DateTimeSplit::class)
                    ->defaultHidden()
                    ->align(TD::ALIGN_RIGHT)
                    ->sort(),
            ]),

            Layout::modal('addKeys', [
                Layout::rows([
                    Input::make('file')
                        ->type('file')
                        ->accept('*.txt')
                        ->required()
                        ->title('Выберите файл с ключами Laravel Idea')
                        ->help('Пожалуйста, выберите файл формата .txt, содержащий ключи для Laravel Idea. Каждый ключ должен быть на новой строке.'),
                ]),
            ])->title('Загрузка ключей Laravel Idea'),

        ];
    }

    /**
     * Add keys from a file to the database.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function addKeys(Request $request): void
    {
        // Validate the incoming request.
        $request->validate([
            'file' => 'required|file|mimes:txt',
        ]);

        // Read the keys from the uploaded file.
        $keys = file($request->file('file')->getRealPath(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Prepare keys for insertion into the database.
        $keysForInsertion = collect($keys)
            ->map(fn ($key) => ['id' => Str::uuid(), 'key' => $key])
            ->toArray();

        // Insert keys into the database, ignoring duplicates.
        DB::table('idea_keys')->insertOrIgnore($keysForInsertion);

        // Display a success message.
        Toast::info('Ключи успешно добавлены.');
    }
}
