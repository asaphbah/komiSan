<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed de Posts</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @livewireStyles
</head>
<style>
    .tag-container {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    margin: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.tag-container h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.tag-container p {
    font-size: 16px;
    color: #555;
}
</style>
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
    </header>
    <div class="tag-container">
        <h2>Tag em destaque: {{$tag->tag}}</h2>
        <p>Número de posts associados a esta tag: {{$tag->posts->count()}}</p>
        <div class="icon-button">
            <div class="dropdown">
                <button class="icon-button"><i class="fas fa-ellipsis-h"></i></button>
                <div class="dropdown-content">
                    <a href="{{ route('report.tag.create', ['tag_id' => $tag->id]) }}">Reportar tag</a>
                    @auth
                        @if ($tag->isUserRelatedToTag())
                            <a href="{{ route('user.tag.destroy', ['id' => $tag->id]) }}">Remover dos seus gostos</a>
                        @else
                            <a href="{{ route('user.tag.store', ['id' => $tag->id]) }}">Adicionar aos seus gostos</a>
                        @endif   
                    @endauth             
                </div>
            </div>
        </div>
    </div>
    <livewire:tags-posts :tag="$tag->tag" >
    @livewireScripts
    <script src={{ asset('js/script.js') }}></script>
</body>
</html>