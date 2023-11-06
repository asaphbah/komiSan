<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/system/icon.png')}}" type="image/x-icon">
    <title>Komisan: Portfólios</title>
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
        <div class="container-tittle">
            <a href="index.html">
                <h1 class="tittle-nav">Komi<span class="san">san</span></h1>
            </a>
            <h1>: Portfólios</h1>
        </div>
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
            <li><a class="selected-anchor" href="{{ route('user.home') }}">Artistas</a></li>
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
    <div class="container">
        <div class="portfolio-container">
            <!-- Card 1 -->
            @foreach($users as $artista)
            <div class="portfolio-card">
                <a href="{{ route('profile.komisan', ['username' => $artista->username]) }}" ><img src="{{ asset('storage/' . $artista->img_user) }}" alt="Imagem do Usuário"></a>
                <h2>{{$artista->username}}</h2>
                <div class="stars">
                    <!-- Star icons using Font Awesome -->
                    @for($i = 1; $i <= 5; $i++)
                    @if ($i <= $artista->averageRating())
                        <i class="fas fa-star"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
                </div>
                <div class="footer-card">
                        @foreach ($artista->posts()->take(3)->get() as $port )

                        <img src="{{ asset('storage/' . $port->img_post) }}" alt="">

                        @endforeach
                </div>  
                <div class="container-tags">
                    @foreach($artista->artistTags as $tag)
                    <span class="art-style">{{$tag->tag}}</span>
                    @endforeach
                </div>

                @php
                    $averageRating = optional($artista->averageRating())->average_rating;
                @endphp
                <!-- <h1>{{ empty(round($artista->averageRating())) ? '' : round($artista->averageRating()) }}</h1> -->
            </div>
            @endforeach
            </div>
        </div>
    </div>
            <script src={{ asset('js/script.js') }}></script>
</body>
</html>