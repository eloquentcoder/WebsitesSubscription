<?php

namespace App\Services;

use App\Models\Subscription;

class UpdateDispatchStatus {
    
    public static function dispatch(Subscription $subscription)
    {
        $subscription->update([
            'email_dispatched' => true
        ]);
    }
}