<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * List all resources.
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::paginate(6)
            ->through(function($post) {
                $post->preview = Str::words($post->content, 30, ' (...)');
                return $post;
            });

        return view('blog.index', compact('posts'));
    }

    /**
     * Show a specific resource.
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {        
        $post = Post::find($id);

        return view('blog.show', compact('post'));
    }
}
