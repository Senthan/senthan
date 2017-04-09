<?php

namespace App\Observers;

use App\Events\ContactCreated;

class ContactObserver {

    public function created($model)
    {
        event(new ContactCreated($model));
    }
    public function updated($model)
    {

    }
    public function saved($model)
    {
        
    }
    public function deleted($model)
    {
        
    }
}
