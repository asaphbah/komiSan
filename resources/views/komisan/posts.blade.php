<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/system/icon.png')}}" type="image/x-icon">
    <title>Komisan: Explorar</title>
    @livewireStyles
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
            <li><a class="selected-anchor" href="{{ route('user.explorer') }}">Explorar</a></li>
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
    <livewire:explorar-komisan>    
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