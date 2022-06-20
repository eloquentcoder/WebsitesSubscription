<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the subscription that owns the SubscriptionPost
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

}
