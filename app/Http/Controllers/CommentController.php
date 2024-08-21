<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {

    }

    public function store(StoreCommentRequest $request)
    {
        $comment = $request->validated();
        $comment = [
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
            'parent_id' => $request->post_id,
        ];

        Comment::create($comment);

        $response = array(
            'status' => 'success',
            'msg' => 'Commented successfully created',
        );

        return response()->json([$response]);
    }

    public function getComments($id)
    {
        $comments = Comment::where('post_id', $id)->orderBy('id', 'desc')->with('user')->get();

        return response()->json(['comments' => $comments]);
    }
}
