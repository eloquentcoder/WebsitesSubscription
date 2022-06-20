<?php

namespace App\Services;

use App\Mail\SubscriptionAlert;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\Website;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionAlertEmail {

    public static function sendEmail(Website $website, Post $post)
    {
        Subscription::where('website_id', $website->id)->chunk(200, function($subscriptions) use($post, $website) {
            foreach ($subscriptions as $subscription) {
                Mail::to($subscription->user->email)->later(now()->addMinute(), new SubscriptionAlert($post, $subscription->user, $website));
            }
        });
        
    }
}