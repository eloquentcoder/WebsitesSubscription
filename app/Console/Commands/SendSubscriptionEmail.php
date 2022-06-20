<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Website;
use App\Services\SendSubscriptionAlertEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendSubscriptionEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email PostTitle {title} and Description {description} to {website_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post to all subscribers of website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post_exists = Post::where('title', $this->argument('title'))->orWhere('description', $this->argument('description'))->exists();
        Log::warning($post_exists);
        if (!$post_exists) {
            $website = Website::find($this->argument('website_id'));
            $post = $website->posts()->create([
                'title' => $this->argument('title'),
                'description' => $this->argument('description'),
            ]);
    
            SendSubscriptionAlertEmail::sendEmail($website, $post);
        }
        
    
    }
}
