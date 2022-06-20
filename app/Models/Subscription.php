<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the Subscription
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the website that owns the Subscription
     *
     */
    public function website()
    {
        return $this->belongsTo(Website::class);
    }

}
