<div class="featured__submenu--secondary" @auth data-interactable="{{ $interactable->interactable_code }}" @endauth>
    <span class="featured__submenu--trigger">
        <span class="fa fa-circle-o"></span>
        <span class="fa fa-circle-o"></span>
        <span class="fa fa-circle-o"></span>
    </span>

    <a href="#" class="bookmark-interactable--trigger">
        <span class="fa fa-lg {{ ($interactable->bookmarkedBy(auth()->user())) ? 'fa-bookmark text-danger' : 'fa-bookmark-o' }}"></span>
    </a>

    <a href="#" class="like-interactable--trigger">
        <span class="fa fa-lg {{ ($interactable->likedBy(auth()->user())) ? 'fa-heart text-danger' : 'fa-heart-o' }}"></span>
    </a>

    <a href="#" class="featured__submenu-socials--trigger">
        <span class="fa fa-lg fa-share-alt"></span>
    </a>
    <div class="featured__submenu-socials">
        <div class="share-item" data-url="{{ $share_route }}"></div>
    </div>
</div>