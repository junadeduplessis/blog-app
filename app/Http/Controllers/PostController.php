<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * List all resources.
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Create new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store newly created resource.
     *
     * @param StorePostRequest $request
     * @return void
     */
    public function store(StorePostRequest $request)
    {
        $post = $request->validated();
        $post['user_id'] = auth()->user()->id;

        Post::create($post);

        return redirect()->route('posts.index');
    }

    /**
     * Show a specific resource.
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {        
        $post = Post::with('likes')->find($id);
        $comments = Comment::with('user')->where('post_id', $id)->orderBy('id', 'desc')->get();

        return view('posts.show', compact('post', 'comments'));
    }
}
