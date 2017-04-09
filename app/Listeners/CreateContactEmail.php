<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class CreateContactEmail implements ShouldQueue
{
    protected $mailer;
    use DispatchesJobs;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(ContactCreated $event)
    {
        $contact = $event->contact;
        $data['contact'] = $contact;
	$this->mailer->send('email.contact-created', $data, function($message) {
        	$message->to('senthaneng@gmail.com')->subject(env('PRODUCT_NAME', 'senthaneng.com ') . ' - Contact created');
    	});
    }
}
