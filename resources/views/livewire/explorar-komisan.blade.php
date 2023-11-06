<div>
    @auth
        <ul class="menu">
            <li class="menu-item" wire:click="postsForYou">Para você</li>
            <li class="menu-item" wire:click="postsViral">Virais</li>
            <li class="menu-item"wire:click="postsFollowers">Seguindo</li>
        </ul>    
    @endauth
    <section class="feed">
        @foreach ($posts as $post)

        <div class="post">
            <div class="post-header">
                <div class="user-photo"><img src="{{ asset('storage/' . $post->user->img_user) }}" alt="Foto do Usuário"></div>
                <div class="user-name">{{$post->user->username}}</div>
                <div class="icon-button">
                    <div class="dropdown">
                        <button class="icon-button"><i class="fas fa-ellipsis-h"></i></button>
                        <div class="dropdown-content">
                            <a wire:click="save({{$post->id}})" >Salvar</a>
                            <a href="{{ route('report.post.create', ['id' => $post->id]) }}">Reportar post</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="img-post" href="{{route('post.unico',['id'=> $post->id])}}"><img src="{{ asset('storage/' . $post->img_post) }}" alt="Imagem do Post"></a>
            <div class="post-footer">
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
                <span class="likes-count">curtidas: {{$post->likeCount->count()}}</span>
                <div class="post-comment">{{$post->title}}</div>
            </div>
        </div>
        
        @endforeach    
    </section>
</div>
