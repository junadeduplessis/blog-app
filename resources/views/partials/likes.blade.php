<div>
    <button type="submit" class="fw-light nav-link fs-6" id="likePostBtn">
        <i class="fa-regular fa-thumbs-up me-2"></i>
        <span id="likesTotal">{{ $post->likes()->count() }}</span>
    </button>
</div>
