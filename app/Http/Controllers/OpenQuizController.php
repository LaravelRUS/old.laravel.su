<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class OpenQuizController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function index()
    {
        return response(view('pages.open'))->withHeaders([
            'X-Goronich-Key' => (new \App\CaesarCipher(11, 'en'))->encrypt('laravel.su/open/now'),
        ]);
    }

    /**
     * @return string
     */
    public function goronich(Request $request)
    {
        if ($request->isMethod('DELETE')) {
            $text = base64_encode("Твоя победа надо мной неоспорима! И сейчас я раскрываю тебе тайну: все сокровища лежат перед тобой на самом видном месте, хотя и маскируются изображениями. Внимательно присмотрись к ним, разгадай их скрытый смысл.");
            $chars = str_split($text);
            $badText = '';

            foreach($chars as $key => $char) {

                $badText .= $char;

                if( array_key_last($chars) !== $key){
                    $badText .= Arr::random(['@', '#', '$', '%', '🥹', '😢', '🫠']);
                }
            }

            return response("Змей Горыныч был побежден! В его последние мгновения он прошептал неразборчивые слова: $badText")->withHeaders([
                'X-Vasilisa-Say' => 'Кажется он сказал что-то на Base64? Попробуй расшифровать',
            ]);
        }

        return (new \App\CaesarCipher(11))->encrypt('Ты стоишь перед Змеем Горынычем, который грозит погубить тебя. Тебе необходимо уничтожить его величие используй силу Laravel.');
    }
}
