<?php

namespace Pattern\Facade;

class NotificationService
{
    public function send($message, $target): void
    {
        $server = new NotificationServer();
        $server->connect('127.0.0.1',445);
        $server->authenticate('app_1001', 'Key');
        $server->sendNotification(new Message($message), $target);
    }
}