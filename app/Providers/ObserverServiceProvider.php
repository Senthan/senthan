<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contact;
use App\Observers\ContactObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Contact::observe(new ContactObserver());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}


