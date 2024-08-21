<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Like $like)
    {
        $liker = auth()->user();

        $liker->likes()->attach($like->id);

        return redirect()->route('posts.index')->with('success', 'post is liked!');
    }
}
