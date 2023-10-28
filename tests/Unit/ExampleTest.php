<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Queue;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function testMessageCanBeDispatchedAndReceived()
    {
        // Создание экземпляра класса Queue
        $queue = new Queue('test');

        // Создание фиктивного действия при получении сообщения
        $action = function (string $message, int $type) {
            $this->assertEquals('Hello, world!', $message);
            $this->assertEquals(1, $type);
        };

        // Отправка сообщения в очередь
        $queue->dispatch('Hello, world!');

        // Получение сообщения из очереди
        $queue->listen($action);
    }

    public function testMessageCanBeDispatchedAndReceived2()
    {
        // Создание экземпляра класса Queue
        $queue = new Queue('test');
        //$queue->clear();

        // Создание фиктивного действия при получении сообщения
        $action = function () {
            $this->assertTrue(true);
        };

        // Отправка сообщения в очередь
        $queue->dispatchClosure($action);

        // Получение сообщения из очереди
        $queue->listenClosure($action);
    }

    public function testFailedMessageReceive()
    {
        // Создание экземпляра класса Queue
        $queue = new Queue('test');

        // Создание фиктивного действия в случае ошибки при получении сообщения
        $failedAction = function ($error) {
            $this->fail('Failed to receive a message: '.$error);
        };

        // Получение сообщения из очереди с указанием несуществующего типа сообщения
        //$queue->listen(function () {}, $failedAction);
    }
}
