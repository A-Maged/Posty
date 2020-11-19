<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Mail;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request)
    {
        if ($post->likedBy($request->user())) {
            return back();
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        $isLikedBefore = $post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count();

        if (!$isLikedBefore) {
            $mail = new PostLiked($request->user(), $post);

            Mail::to($post->user)->send($mail);
        }

        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
