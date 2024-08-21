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
            <div class="card">
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

<script type="module">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#addCommentBtn').click(function(e){
        e.preventDefault();
        let formData = {
            'content': $('#content').val(),
            'post_id': $('#post_id').val(),
        };
        $.ajax({
            type: 'POST',
            url: '/comments/',
            dataType: 'json',
            data: formData,
            success: function(data) {
                console.log('Data Saved');
                $('#content').val('');
                fetchComments();
            },
            error: function(error) {
                console.log(error);
            }
        })
    });

    fetchComments();

    function fetchComments()
    {
        $.ajax({
            url: '/get-comments/' + $('#post_id').val(),
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var comments = response.comments;
                var commentsList = $('.display-comment');
                commentsList.empty();

                comments.forEach(function(comment) {
                    commentsList.append('<strong>' + comment.user.name + '</strong>');
                    commentsList.append('<p>' + comment.content + '</p>');
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>
@endsection