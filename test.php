<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChatFunction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chat-function';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invoke a chat function with OpenAI language model.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = \OpenAI::factory()
            ->withApiKey(config('openai.api_key'))
            ->make();

        $response = $client->chat()->create([
            'model'     => 'gpt-3.5-turbo-0613',
            'messages'  => [
                [
                    'role'    => 'user',
                    'content' => 'What do you know about IP 12.175.87.227 ?',
                ],
            ],
            'functions' => [
                [
                    'name'        => 'about_ip',
                    'description' => 'Get information about the IP address',
                    'parameters'  => [
                        'type'       => 'object',
                        'properties' => [
                            'ip' => [
                                'type'        => 'string',
                                'description' => 'IP address v4',
                            ],
                        ],
                        'required'   => ['ip'],
                    ],
                ],
            ],
        ]);

        // Теперь у нас есть предложение вызвать функцию с нашей стороны и есть аргументы:
        $name = $response->choices[0]->message->functionCall->name; // about_ip
        $arguments = $response->choices[0]->message->functionCall->arguments; // {\n "ip": "12.175.87.227" }

        $functionResult = $this->callRPC($name, $arguments);

        // Опять же, мы обращаемся к ChatGPT, но на этот раз мы добавляем ответ от функции:
        $response = $client->chat()->create([
            'model'     => 'gpt-3.5-turbo-0613',
            'messages'  => [
                ['role' => 'user', 'content' => 'What do you know about IP 12.175.87.227 ?'],
                ['role' => 'function', 'name' => $name, 'content' => $functionResult],
            ],
            'functions' => [
                [
                    'name'        => 'about_ip',
                    'description' => 'Get information about the IP address',
                    'parameters'  => [
                        'type'       => 'object',
                        'properties' => [
                            'ip' => [
                                'type'        => 'string',
                                'description' => 'IP address v4',
                            ],
                        ],
                        'required'   => ['ip'],
                    ],
                ],
            ],
        ]);

        $response->choices[0]->message->content;

        // IP-адрес 12.175.87.227 находится в городе Сан-Диего, Калифорния, Соединенные Штаты.
        // Почтовый индекс - 92110.
        // Координаты широты и долготы составляют 32.7616 и -117.2058 соответственно.
        // Часовой пояс этого местоположения - America/Los_Angeles.
        // Интернет-провайдер (ISP) - AT&T Services, Inc.
        // Организация, связанная с этим IP-адресом - Coffman Specialties.
        // Номер автономной системы (AS) - AS7018 AT&T Services, Inc.
    }
}
