<?php

namespace App\Providers;

use App\Models\SentMails;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Event::listen(MessageSent::class, function (MessageSent $event) {

            // Get the first recipient's email address
            $recipient = $event->message->getTo()[0]->getAddress();

            // Update the record in your database
            SentMails::where('email', $recipient)
                ->where('status', 'pending')
                ->latest()
                ->update(['status' => 'delivered']);
        });
    }
}
