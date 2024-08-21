@extends('layouts.app')
   
@section('content')

<div class="container">
    <a class="float-end" href="{{ route('blog.index') }}">Back</a>
    <div class="text-center my-5">
        <h1>Latest Blog Posts</h1>
        <hr />
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card text-center border-0">
                <div class=" mb-5">
                    <img src="{{ asset('img/placeholder.jpg') }}" alt="image" class="img-fluid"/>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $post->title }}</h2>
                    </div>
                    <div class="card-text">
                        <p>{{ $post->content }}</p>
                    </div>
                    <span>{{ $post->created_at->todatestring() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection
