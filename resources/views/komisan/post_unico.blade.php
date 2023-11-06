<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/system/icon.png')}}" type="image/x-icon">
    <title>Feed de Posts</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <div id="container-btnBurger">
            <button id="btnBurger" aria-label="Abrir menu" aria-controls="menu" aria-expanded="false">
                <span id="spanBurger"></span>
            </button>
        </div>
        <a href="index.html">
            <h1>Komi<span class="san">san</span></h1>
        </a>
        <div id="container-btnAccount">
            @auth
                <a href="{{ route('profile.komisan', ['username' => auth()->user()->username]) }}"  id="container-btnAccount">
                    <img src=" {{ asset('storage/' . auth()->user()->img_user) }}" alt="">
                </a>
            @endauth
            @guest
            <div  id="container-btnAccount">
                <!-- <img src=" {{asset('img/system/imagem sla o que')}}" alt=""> -->
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="">
            </div>
            @endguest
        </div>
    </header>
    <nav>
        <menu id="menu-nav">
            <ul id="menu" role="menu">
            <li><a href="{{ route('user.explorer') }}">Explorar</a></li>
        @guest
            <li><a href="{{ route('user.login') }}">Entrar</a></li>
            <li><a href="{{ route('user.create.one') }}">Cadastrar</a></li>
        @endguest
        @auth
            <li><a href="{{ route('user.home') }}">Artistas</a></li>
            <li><a href="{{ route('post.create') }}">Postar</a></li>
            <li><a href="{{ route('request.show') }}">Encomendas</a></li>
            @if (auth()->user()->email === 'Komisan@gmail.com')
                <li><a href="{{ route('show.report.user') }}">report user</a></li>
                <li><a href="{{ route('show.report.post') }}">report post</a></li>
                <li><a href="{{ route('show.report.tag') }}">report tag</a></li>
            @endif
            <li><a href="{{ route('user.logout') }}">Sair</a></li>
        @endauth
            </ul>
        </menu>
    </nav>
    <div class="container-posts">
        <div class="post-principal">

            <div>
                <img src="{{ asset('storage/' . $post->img_post) }}" alt="Imagem do Post Principal">
            </div>

            <div>
                <div class="post-content">
                    <div class="post-header">
                        <a href="{{ route('profile.komisan', ['username' => $post->user->username]) }}" class="user-photo"><img src="{{ asset('storage/' . $post->user->img_user) }}" alt="Foto do Usuário"></a>
                        <div class="user-name">{{$post->user->username}}</div>
                        @auth
                            @if ($post->user->id != auth()->user()->id)
                                @if ($post->user->followerAuth->count())
                                <a href="{{ route('user.unfollow', ['follower_id' => auth()->user()->id, 'following_id' => $post->user->id]) }}" class="follow-button followed">Deseguir</a>
                                @else
                                <a href="{{ route('user.follow', ['user_id' => $post->user->id, 'follower_id' => auth()->user()->id]) }}" class="follow-button">Seguir</a>
                                @endif
                            @endif
                        @endauth
                        <div class="icon-button">
                            <div class="dropdown">
                                <button class="icon-button"><i class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-content">
                                    <a wire:click="save({{$post->id}})" >salvar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2>{{$post->title}}</h2>
                    <p class="post-comment">{{$post->comentario}}</p>
                        <livewire:post-unico-like :post_id="$post->id" >
                    <div>
                        @foreach ($post->tags as $tag)
                        <a href="{{route('tag.show', ['tagShow'=>$tag->tag])}}"  class="art-style">{{$tag->tag}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <h3 class="relacionados">Relacionados</h3>

        <livewire:feed-post-unico :id="$post->id" >
        
    </div>
    <script src={{ asset('js/script.js') }}></script>
</body>
</html>