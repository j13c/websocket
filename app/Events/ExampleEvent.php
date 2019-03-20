<?php

namespace App\Events;

use App\History;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;


class ExampleEvent extends Event
{
    use SerializesModels;

    public $message;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(History $history)
    {
        $this->message = $history;
    }
}
