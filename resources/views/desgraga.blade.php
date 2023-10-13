<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komisan</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
.pedido-card {
        max-width: 1200px;
        box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.425);
        background-color: white;
        border-radius: 20px;
        display: flex;
        align-items: center;
        padding: 20px;
        justify-content: space-between;
        margin-bottom: 20px; /* Adicionei margem na parte de baixo para separar os cards */
        position: relative; /* Adicionado position relative */
    }
    .conclui{
        color: white;
        background-color: #40a5a8;
    }
    .conclui .envio{
        color: white !important;
    }
    .pedido-card .info {
        display: flex;
        align-items: center; /* Centralize verticalmente */
    }

    .pedido-card .info img {
        max-width: 100px; /* Ajuste o tamanho conforme necessário */
        height: auto;
        border-radius: 50%;
        margin-right: 20px; /* Espaço entre a imagem e o texto */
    }

    .pedido-card .info div {
        display: flex;
        flex-direction: column;
    }

    .pedido-card .title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px; /* Espaço entre o título e o prazo */
    }

    .pedido-card .prazo {
        font-size: 14px;
    }

    .pedido-card .actions {
        display: flex;
        align-items: center;
    }

    .pedido-card button {
        font-size: 24px;
        margin-left: 10px;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .pedido-card .status {
        font-size: 18px;
        font-weight: bold;
    }

    .pedido-card .envio {
        font-size: 14px;
        color: #000000;
    }
  
</style>
<body>
    <header>
        <button id="btnBurger" aria-label="Abrir menu" aria-controls="menu" aria-expanded="false"><span id="spanBurger"></span></button>
        <a href="index.html"><h1>Komi<span class="san">san</span></h1></a>
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
                        <li><a href="{{ route('user.logout') }}">Sair</a></li>
                    @endauth
                </ul>
            </menu>
        </nav>
    </header>
    <div class="container-posts">
        <ul class="menu">
            <li class="menu-item">Em Processo</li>
            <li class="menu-item">Pendentes</li>
            <li class="menu-item">Concluídos</li>
        </ul>
        <div class="pedido-card conclui">
            <div class="info">
                <img src="https://picsum.photos/200" alt="Imagem do Pedido" class="img-pedido">
                <div>
                    <div class="title">Pedido Concluído</div>
                    <div class="prazo">Prazo: 30 dias</div>
                </div>
            </div>
            <div class="actions">
                <div>
                    <div class="status">Concluído</div>
                    <div class="envio">Data de Envio: 25/09/2023</div>
                </div>
                <button class="order-button" title="Fazer Pedido"><i class="fas fa-file"></i></button>
            </div>
        </div>

    
        <!-- Pedido Pendente -->
        <div class="pedido-card ">
            <div class="info">
                <img src="https://picsum.photos/200" alt="Imagem do Pedido" class="img-pedido">
                <div>
                    <div class="title">Pedido Pendente</div>
                    <div class="prazo">Prazo: 30 dias</div>
                </div>
            </div>
            <div class="actions">
                <div>
                    <div class="status">Pendente</div>
                    <div class="envio">Data de Envio: 28/09/2023</div>
                </div>
                <button class="order-button" title="Aceitar Pedido"><i class="fas fa-check"></i></button>
                <button class="order-button" title="Recusar Pedido"><i class="fas fa-times"></i></button>
            </div>
        </div>

        <!-- Pedido em Processo -->
        <div class="pedido-card ">
            <div class="info">
                <img src="https://picsum.photos/200" alt="Imagem do Pedido" class="img-pedido">
                <div>
                    <div class="title">Pedido em Processo</div>
                    <div class="prazo">Prazo: 30 dias</div>
                </div>
            </div>
            <div class="actions">
                <div>
                    <div class="status">Em Processo</div>
                    <div class="envio">Data de Envio: 20/09/2023</div>
                </div>
                <button class="chat-button" title="Chat"><i class="fas fa-comment"></i></button>
                <button class="order-button" title="Fazer Pedido"><i class="fas fa-file"></i></button>
            </div>
        </div>
    </div>

        
    </div>
    <script src={{ asset('js/script.js') }}></script>
</body>
</html>
