<?php

namespace Pattern\Facade;

class NotificationServer
{

    public function connect($host, $port): void
    {
        echo "Connected to server at $host:$port\n";
    }

    public function authenticate($appID, $key): void
    {
        echo "Authenticated with app ID: $appID\n";
    }
    public function sendNotification(Message $message, $target): void
    {
        echo $message->getMessage() . " to " . $target . "\n";
    }
}