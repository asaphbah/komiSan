<div>
        <ul class="menu">
            <li class="menu-item" wire:click="myPosts">Meus posts</li>
            <li class="menu-item" wire:click="likesPosts">Curtidos</li>
            <li class="menu-item" wire:click="favoritPosts">Salvos</li>
        </ul>
    
        <section class="feed">
            @foreach ($posts as $post)
    
            <article class="post">
                <div class="post-header">
                    <div class="user-photo"><img src="{{ asset('storage/' . $post->user->img_user) }}" alt="Foto do Usuário"></div>
                    <div class="user-name">{{$post->user->username}}</div>
                    <div class="icon-button">
                        <div class="dropdown">
                            <button class="icon-button"><i class="fas fa-ellipsis-h"></i></button>
                            <div class="dropdown-content">
                                <a wire:click="save({{$post->id}})" >salvar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="img-post" href="{{route('post.unico',['id'=> $post->id])}}"><img src="{{ asset('storage/' . $post->img_post) }}" alt="Imagem do Post 1"></a>
                <div class="post-footer">
                    <h2>{{$post->title}}</h2>
                    @auth
                        @if ($post->likeUser())
                        <button class="like-button unliked" title="Descurtir" wire:click="unliked({{ $post->id }})"><i class="far fa-heart"></i></button>
                            
                        @else
                            <button class="like-button" wire:click="like({{ $post->id }})"><i class="fas fa-heart"></i></button>
                        @endif
                    @endauth
                    <span class="likes-count">likes:{{$post->likes->count()}}</span>
                </div>
            </article>
             
            @endforeach    
        </section>
</div>
