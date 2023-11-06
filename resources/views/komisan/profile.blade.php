<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/system/icon.png')}}" type="image/x-icon">
    <title>Komisan: Perfil</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @livewireStyles
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
        <div id="container-btnAccount" class="non-visible">
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
    <div class="container-profile">
        <div class="container-profile-info">
            <section class="sec-profile">
                <img class="profile-cover" src="{{ asset('storage/' . $user->img_cover) }}" draggable="false" alt="Foto de Capa">
                <div class="container-profile-foto"><img class="profile-img" src="{{ asset('storage/' . $user->img_user) }}" draggable="false" alt="Foto de Artista"></div>
                <div class="profile-photo">
                    <div class="profile-name">{{$user->username}}</div>
                    <ul class="profile-stats">
                        <li class="profile-stat">Seguidores: {{$user->followers->count()}}</li>
                        <li class="profile-stat">Seguindo: {{$user->following->count()}}</li>
                        <li class="profile-stat">Postagens: {{ $user->postCount() }}</li>
                    </ul>
                    <!-- <div class="dropdown-profile">
                        <div class="dropdown dropdown-profile">
                            <button class="config-button-container">
                                <i class="fas fa-cogs"></i>
                            </button>
                            <div class="dropdown-content">
                                <a href="#">Editar perfil</a>
                                <a href="#">Alterar senha</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="profile-cta">
                    @auth
                        @if (auth()->user()->id != $user->id)
                            @if ($user->followerAuth->count())
                                <a href="{{ route('user.unfollow', ['follower_id' => auth()->user()->id, 'following_id' => $user->id]) }}" class="follow-button followed">Deseguir</a>
                            @else
                                <a href="{{ route('user.follow', ['user_id' => $user->id, 'follower_id' => auth()->user()->id]) }}" class="follow-button">Seguir</a>
                            @endif
                        @endif
                    @endauth
                </div>
            </section>
            @if ($user->artist == 1)
                <section class="sec-review">
                    <h2>REVIEW DO ARTISTA</h2>
                    <div class="review">
                        <div class="stars">
                            <!-- Star icons using Font Awesome -->
                            @for($i = 1; $i <= 5; $i++)
                            @if ($i <= $user->averageRating())
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <div class="rating">Rating: {{round($user->averageRating()) }}</div>
                        <div class="art-styles-container">
                            @foreach ($user->artistTags as $tag)
                                <span class="art-style">{{$tag->tag}}</span>
                            @endforeach
                        </div>
                        <div class="submit-order">
                            <a href="{{route('create.request', ['artist' => $user->id])}}">encomenda</a>
                        </div>
                    </div>
                </section>
            @endif
        </div>
        <div class="container-profile-posts">
            <section class="bio-section">
                <h2>Bio</h2>
                <div class="bio-content">
                    {{$user->bio}}
                </div>
            </section>
            <livewire:profile-komisan :user_id="$user->id" />
        </div>
    </div>
    @livewireScripts
    <script src={{ asset('js/script.js') }}></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('ul.menu li.menu-item');

    // Adiciona um event listener para cada item da lista
    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            // Remove a classe "active" de todos os itens
            menuItems.forEach(item => item.classList.remove('active'));
            
            // Adiciona a classe "active" apenas ao item clicado
            item.classList.add('active');
        });
    });
});
    </script>
</body>
</html>