<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $userLike = auth()->user();

        $userLike->likes()->attach($post->id);

        $response = array(
            'status' => 'success',
            'msg' => 'Post liked successfully',
        );

        return response()->json([$response]);
    }

    public function getLikes($id)
    {
        $likes = Like::where('post_id', $id)->count();

        return response()->json(['likes' => $likes]);
    }
}
