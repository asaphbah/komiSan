<div>
    <section class="feed">
        @foreach ($post_relacionados as $post_relacionado)
            <article class="post">
                <div class="post-header">
                    <a href="{{ route('profile.komisan', ['username' => $post_relacionado->user->username]) }}" class="user-photo"><img src="{{ asset('storage/' . $post_relacionado->user->img_user) }}" alt="Foto do Usuário"></a href="{{route('post.unico',['id'=> $post_relacionado->id])}}">
                    <div class="user-name">{{$post_relacionado->user->username}}</div>
                    <div class="icon-button">
                        <div class="dropdown">
                            <button class="icon-button"><i class="fas fa-ellipsis-h"></i></button>
                            <div class="dropdown-content">
                                <a wire:click="save({{$post_relacionado->id}})" >salvar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="img-post" href="{{route('post.unico',['id'=> $post_relacionado->id])}}"><img src="{{ asset('storage/' . $post_relacionado->img_post) }}" alt="Imagem do Post 1"></a>
                <div class="post-footer">
                    <h2>{{$post_relacionado->title}}</h2>
                        @auth
                        @if (!$post_relacionado->likeUser->count())
                        <button class="like-button unliked" wire:click="like({{ $post_relacionado->id }})" title="Curtir">
                            <i class="fas fa-heart"></i>
                        </button>
                        @else
                        <button class="like-button liked "wire:click="unliked({{ $post_relacionado->id }})" title="Descurtir">
                            <i class="far fa-heart"></i>
                        </button>
                        
                        @endif 
                    @endauth
            
                    <span class="likes-count">likes:{{$post_relacionado->likes->count()}}</span>
                      
                </div>
            </article>
        @endforeach
        
    </section>
</div>
