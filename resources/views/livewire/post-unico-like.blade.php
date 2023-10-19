<div>
    @auth
        @if (!$post->likeUser->count())
        <button class="like-button unliked" wire:click="like({{ $post->id }})" title="Curtir">
            <i class="fas fa-heart"></i>
        </button>
        @else
        <button class="like-button liked "wire:click="unliked({{ $post->id }})" title="Descurtir">
            <i class="far fa-heart"></i>
        </button>
        
        @endif 
    @endauth

    <span class="likes-count">likes:{{$post->likes->count()}}</span>
</div>
