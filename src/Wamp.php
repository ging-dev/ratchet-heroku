<?php

namespace Gingdev;

use Exception;
use Ratchet\ConnectionInterface as Conn;
use Ratchet\Wamp\WampServerInterface;

class Wamp implements WampServerInterface
{
    public function onPublish(Conn $conn, $topic, $event, array $exclude, array $eligible)
    {
        $topic->broadcast($event);
    }

    public function onCall(Conn $conn, $id, $topic, array $params)
    {
        $conn->callError($id, $topic, 'RPC not supported');
    }

    public function onSubscribe(Conn $conn, $topic)
    {
        echo "New Subscribe! ({$topic})\n";
    }

    public function onUnSubscribe(Conn $conn, $topic)
    {
    }

    public function onOpen(Conn $conn)
    {
    }

    public function onClose(Conn $conn)
    {
    }

    public function onError(Conn $conn, Exception $e)
    {
    }
}
