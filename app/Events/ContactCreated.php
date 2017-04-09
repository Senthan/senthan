<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Contact;

class ContactCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
