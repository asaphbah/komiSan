<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komisan</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <button id="btnBurger" aria-label="Abrir menu" aria-controls="menu" aria-expanded="false">
            <span id="spanBurger"></span>
        </button>
        <a href="index.html">
            <h1>Komi<span class="san">san</span></h1>
        </a>
        <nav>
            <menu id="menu-nav">
                <ul id="menu" role="menu">
                <li><a href="{{ route('user.explorer') }}">Explorar</a></li>
            @guest
                <li><a href="{{ route('user.login') }}">Entrar</a></li>
                <li><a href="{{ route('user.create.one') }}">Cadastrar</a></li>
            @endguest
            @auth
                <li><a href="{{ route('profile.komisan', ['username' => auth()->user()->username]) }}">Profile</a></li>
                <li><a href="{{ route('user.home') }}">Artistas</a></li>
                <li><a href="{{ route('post.create') }}">Postar</a></li>
                <li><a href="{{ route('request.show') }}">Encomendas</a></li>
                <li><a href="{{ route('user.logout') }}">Sair</a></li>
            @endauth
                </ul>
            </menu>
        </nav>
    </header>
    <div class="container">
        <div class="portfolio-container">
            <!-- Card 1 -->
                   <!-- Card 1 -->
                   @foreach($users as $artista)
                        <div class="portfolio-card">
                            <a href="{{ route('profile.komisan', ['username' => $artista->username]) }}" ><img src="{{ asset('storage/' . $artista->img_user) }}" alt="Imagem do Usuário"></a>
                            <h2>{{$artista->name}}</h2>
                            @foreach($artista->artistTags as $tag)
                                <span class="art-style">{{$tag->tag}}</span>
                            @endforeach

                            @php
                                $averageRating = optional($artista->averageRating())->average_rating;
                            @endphp

                            <h1>{{ empty(round($artista->averageRating())) ? '' : round($artista->averageRating()) }}</h1>

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
                        </div>
                    @endforeach
                  </div>
              
        </div>
    </div>
            <script src={{ asset('js/script.js') }}></script>
</body>
</html>