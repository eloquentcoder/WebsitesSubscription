<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * Get all of the Posts for the Website
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all of the subscriptions for the Website
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * The users that belong to the Website
     *
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'subscriptions');
    }

}

