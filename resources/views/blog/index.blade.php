@extends('layouts.app')
   
@section('content')

<div class="container">
    <div class="text-center my-5">
        <h1>Latest Blog Posts</h1>
        <hr />
    </div>
    @if(count($posts))
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mb-5 shadow-sm">
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="image" class="img-fluid"/>
                        <div class="card-body">
                            <div class="card-title">
                                <h2>{{ $post->title }}</h2>
                            </div>
                            <div class="card-text">
                                <p>{{ $post->preview }}</p>
                            </div>
                            <div>
                                <span>{{ $post->created_at }}</span>
                            </div>
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center pt-5">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-center mt-4">No Blog Posts Found.</p>
    @endif
</div>
            
@endsection
