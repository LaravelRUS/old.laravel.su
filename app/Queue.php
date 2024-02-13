<?php

namespace App;

use Laravel\SerializableClosure\SerializableClosure;

class Queue
{
    /**
     * @var \SysvMessageQueue
     *
     * The message queue instance.
     */
    private \SysvMessageQueue $queue;

    /**
     * @var int
     *
     * The desired message type for listening. Default is 0.
     */
    private int $desiredMessageType = 0;

    /**
     * @var int
     *
     * The maximum size of a message. Default is 1024 bytes.
     */
    private int $maxMessageSize = 1024;

    /**
     * @param string $name
     *
     * @throws \Throwable
     */
    public function __construct(string $name)
    {
        // ini_set('sysvshm.init_mem', 90000);

        $this->queue = msg_get_queue(crc32($name));

        throw_unless($this->queue, 'Failed to create message queue.');
    }

    /**
     * Listens for incoming messages from the queue and executes the specified action.
     *
     * @param callable      $action The action to be executed when a message is received.
     * @param callable|null $failed The action to be executed if there is an error receiving a message.
     */
    public function listen(callable $action, ?callable $failed = null): void
    {
        $receive = msg_receive(
            queue: $this->queue,
            desired_message_type: $this->desiredMessageType,
            received_message_type: $type,
            max_message_size: $this->maxMessageSize,
            message: $receivedData,
            unserialize: true,
            flags: 0,
            error_code: $error);

        $receive ? value($action, $receivedData, $type) : value($failed, $error);
    }

    /**
     * Sends a message to the queue.
     *
     * @param string $message The message to be sent.
     * @param int    $type    The type of the message.
     *
     * @throws \Throwable
     */
    public function dispatch(string $message, int $type = 1): void
    {
        $result = msg_send($this->queue, $type, $message, true, false, $error);

        throw_unless($result, $error);
    }

    public function dispatchClosure(\Closure $closure, int $type = 1): void
    {
        // $serialized = (string) serialize(new SerializableClosure($closure));
        // $serialized = base64_encode($serialized);

        $serialized = \Illuminate\Support\Str::random(2000);

        $result = msg_send($this->queue, $type, $serialized, false, false, $error);

        dd($result, $serialized, $error, 'test', $this->getStats(), $this->clear());
        throw_unless($result, $error);
    }

    public function listenClosure(): void
    {
        $receive = msg_receive(
            queue: $this->queue,
            desired_message_type: $this->desiredMessageType,
            received_message_type: $type,
            max_message_size: $this->maxMessageSize,
            message: $receivedData,
            unserialize: true,
            flags: 0,
            error_code: $error);

        if ($receive) {
            $closure = unserialize($receivedData)->getClosure();
            $closure();
        }
    }

    /**
     * Returns information from the message queue data structure.
     *
     * @return array|false
     */
    public function getStats(): array|false
    {
        return msg_stat_queue($this->queue);
    }

    /**
     * Removes the message queue.
     *
     * @return bool
     */
    public function clear(): bool
    {
        return msg_remove_queue($this->queue);
    }
}
