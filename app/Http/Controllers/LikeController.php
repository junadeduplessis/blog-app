<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $userLike = auth()->user();

        $userLike->likes()->attach($post->id);

        return redirect()->route('posts.show', $post->id)->with('success', 'post is liked!');
    }
}
