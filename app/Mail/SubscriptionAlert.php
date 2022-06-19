<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionAlert extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $post;
    public $website;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $user, Website $website)
    {
        $this->post = $post;
        $this->website = $website;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.subscription_alert');
    }
}
