<?php

namespace App\Services;
use Illuminate\Support\Facades\Redis;
use Pusher\Pusher;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;


class WebSocketService implements MessageComponentInterface
{
    public function onOpen(ConnectionInterface $connection)
    {
        // TODO: Implement onOpen() method.
    }

    public function onClose(ConnectionInterface $connection)
    {
        // TODO: Implement onClose() method.
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        // TODO: Implement onMessage() method.
    }
    public function broadcast($msg)
    {
        foreach ($this->clients as $client) {
            $client->send($msg);
        }

    }
}
