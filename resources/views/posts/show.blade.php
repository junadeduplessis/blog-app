@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">Blog Post</h3>
                    <br/>
                    <h2>{{ $post->title }}</h2>
                    <p>
                        {{ $post->content }}
                    </p>
                    <span>
                        {{ $post->created_at->todatestring() }}
                    </span>
                    <hr />
                    <div class="d-flex justify-content-between">
                        @include('partials.likes')
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4>Comments</h4>
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="content" id="content"></textarea>
                            <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group pt-3">
                            <button type="submit" id="addCommentBtn" class="btn btn-success">Add Comment</button>
                        </div>
                    </form>
                    <hr />
                    <div class="comments-list">
                        @include('partials.comments')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection