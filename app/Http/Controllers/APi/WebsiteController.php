<?php

namespace App\Http\Controllers\APi;

use App\Events\PostPublished;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebsiteController extends Controller
{
    public function makePost(PostRequest $request, int $id)
    {
        $website = Website::find($id);
        $post = $website->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'is_published' => $request->is_published
        ]);

        PostPublished::dispatch($post, $website);

        return response()->json([
            'status' => true,
            'message' => 'Post Submitted Successfully'
        ]);
    }

    public function subscribe(SubscribeRequest $request, int $id)
    {

        $user = User::firstOrCreate([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $website = Website::find($id);

        $subscription_exists = Subscription::where([['user_id', $user->id], ['website_id', $website->id]])->exists();
        if ($subscription_exists) {
            return response()->json([
                'status' => false,
                'message' => "You are already subscribed to {$website->website_name}"
            ], 401);
        }


        Subscription::create([
            'user_id' => $user->id,
            'website_id' => $website->id
        ]);

        return response()->json([
            'status' => true,
            'message' => "Congratulations, you have successfully subscribed to {$website->website_name}"
        ]);
    }
}
