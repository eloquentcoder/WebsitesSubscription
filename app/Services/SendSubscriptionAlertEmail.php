<?php

namespace App\Services;

use App\Mail\SubscriptionAlert;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionAlertEmail {

    public static function sendEmail(Website $website, Post $post)
    {
        foreach ($website->users as $user) {
            Mail::to($user->email)->later(now()->addMinute(), new SubscriptionAlert($post, $user, $website));
        }
    }
}