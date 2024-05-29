<?php

// app/Models/CustomNotification.phpc

namespace App\Models;

class CustomNotification
{
    protected $message;
    protected $link;

    public function __construct($message, $link)
    {
        $this->message = $message;
        $this->link = $link;
    }

    public function toArray()
    {
        return [
            'message' => $this->message,
            'link' => $this->link,
        ];
    }
}
