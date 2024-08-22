<div>
    <form action="{{ route('post.like', $post->id) }}" method="post">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6">
            <i class="fa-thumbs-up"></i>
            <span>{{ $post->likes()->count() }}</span>
        </button>
    </form>
</div>
