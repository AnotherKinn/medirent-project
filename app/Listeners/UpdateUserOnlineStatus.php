<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;

class UpdateUserOnlineStatus
{
   public function handle($event)
{
    Log::info('EVENT TERPANGGIL:', [
        'event' => get_class($event),
        'user_id' => $event->user->id ?? null
    ]);

    $user = $event->user;

    if ($event instanceof \Illuminate\Auth\Events\Login) {
        $user->update(['is_online' => true]);
    }

    if ($event instanceof \Illuminate\Auth\Events\Logout) {
        $user->update(['is_online' => false]);
    }
}

}
