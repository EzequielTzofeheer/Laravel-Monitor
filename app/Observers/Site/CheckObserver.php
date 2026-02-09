<?php

namespace App\Observers\Site;

use App\Models\Check;
use App\Notifications\Site\EndpointDownNotification;

class CheckObserver
{
    /**
     * Handle the Check "created" event.
     */
    public function created(Check $check): void
    {
        if (! $check->isSucess()) {
            $user = $check->endpoint->site->user;
            $user->notify(new EndpointDownNotification($check));
        }
    }
}
