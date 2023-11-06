<div>
    <section class="feed">
        @foreach ($posts as $post)

        <article class="post">
            <div class="post-header">
                <a href="{{route('profile.komisan',['username' => $post->user->username ])}}" class="user-photo"><img src="{{ asset('storage/' . $post->user->img_user) }}" alt="Foto do Usuário"></a>
                <a href="{{route('profile.komisan',['username' => $post->user->username ])}}" class="user-name">{{$post->user->username}}</a>
                <div class="icon-button">
                    <div class="dropdown">
                        <button class="icon-button"><i class="fas fa-ellipsis-h"></i></button>
                        <div class="dropdown-content">
                            <a wire:click="save({{$post->id}})" >salvar</a>
                            <a href="{{ route('report.post.create', ['id' => $post->id]) }}">Reportar post</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="img-post" href="{{route('post.unico',['id'=> $post->id])}}"><img src="{{ asset('storage/' . $post->img_post) }}" alt="Imagem do Post 1"></a>
            <div class="post-footer">
                <h2>{{$post->title}}</h2>
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
                <span class="likes-count">likes:{{$post->likeCount->count()}}</span>
            </div>
        </article>
         
        @endforeach    
    </section>
</div>
