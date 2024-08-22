<div>
    <button type="submit" class="fw-light nav-link fs-6" id="likePostBtn">
        <i class="fa-thumbs-up"></i>
        <span id="likesTotal">{{ $post->likes()->count() }}</span>
    </button>
</div>
