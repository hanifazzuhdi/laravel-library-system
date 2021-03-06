<?php

namespace App\Listeners;

use App\Events\UserPinjam;
use App\Mail\EmailPinjam;
use Illuminate\Support\Facades\Mail;

class KirimEmailPinjam
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserPinjam  $event
     * @return void
     */
    public function handle(UserPinjam $event)
    {
        Mail::to("exemple@mail.com")->send(new EmailPinjam($event->book));
    }
}
