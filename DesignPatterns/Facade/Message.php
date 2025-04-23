<?php

namespace Pattern\Facade;


class Message
{
    private string $message = '';

    public function __construct($message) {
        $this->message = $message;
    }
    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

}













