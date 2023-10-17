<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komisan</title>
    @livewireStyles
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
    .pedido-card-overlay {
        width: 100vw;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.76); /* Fundo semi-transparente */
        z-index: 999; /* Z-index alto para garantir sobreposição */
    }

    .pedido-card-overlay .view-request {
        overflow-y: auto;
        max-width: 900px; /* Largura máxima do pedido-card dentro do overlay */
        width: 80%; /* Porcentagem da largura da tela que o pedido-card ocupará */
        background-color: white;
        border-radius: 20px 0px 0px 20px;
        box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.425);
        padding: 20px;
        margin: center;
    }
    .pedido-card-overlay .view-request .list-view{
        width: 100%;
        margin: auto;
    }
    .pedido-card-overlay .view-request::-webkit-scrollbar {
        border-radius: 10px;
        width: 12px; /* Largura da barra de rolagem */
    }

    .pedido-card-overlay .view-request::-webkit-scrollbar-thumb {
        background-color: #727272; /* Cor da barra de rolagem */
        border-radius: 10px; /* Borda arredondada da barra de rolagem */
    }

    .pedido-card-overlay .view-request::-webkit-scrollbar-track {
        background-color: #f0f0f0; /* Cor da área de fundo da barra de rolagem */
    }

    /* Para Firefox */
    .pedido-card-overlay .view-request {
        scrollbar-width: 12px; /* Largura da barra de rolagem */
        scrollbar-color: #7c7c7c #f0f0f0; /* Cor da barra e fundo da barra de rolagem */
    }
    /* Adicionando cores aos botões */
    .pedido-card-overlay .order-button {
        border: 1px solid black;
        padding: 5px 7px;
        color: #000000;
        margin: 0 10px;
        border-radius: 10px;
    }

    .pedido-card-overlay .order-button.order-aceitar {
        background-color: #40a5a8;
    }

    .pedido-card-overlay .order-button.order-recusar {
        background-color: #a84040;
    }
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
    .menu-item a{
        color: black;
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
    .order-button{
        cursor: pointer;
        border: 1px solid black;
        padding: 5px 7px;
        color: #000000;
        margin: 0 10px;
        border-radius: 10px;
    }
    .order-aceitar{
        background-color: #40a5a8;
    }
    .order-recusar{
        background-color: #a84040;
    }
    .view-group{
        width: 80%;
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: 
    }
    .view-header{
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
    .leave{
        cursor: pointer;
        font-size: 20px; 
        padding: 2px 5px;
        border-radius: 10px;
        color: #ddd;
        background-color: #a84040;
        margin: 2px 4px;
    }
    .confirm-concluid {
        display: none; 
        position: fixed; /* Fixa na tela para sobreposição */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7); /* Fundo semi-transparente */
        color: rgb(0, 0, 0);
        font-size: 24px;
        display: none;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 9999; /* Z-index alto para garantir sobreposição */
    }
    .confirm-concluid > div{
        border-radius: 10px;
        padding: 12px;
        max-width: 800px;
        height: 200px;
        background-color: #ddd;
    }
    .confirm-concluid p {
        padding: 5px;
        margin-bottom: 20px;
    }

    .confirm-concluid a {
        padding: 10px 20px;
        margin: 0 10px;
        font-size: 18px;
        background-color: #40a5a8; /* Cor de fundo */
        color: white; /* Cor do texto */
        border: none;
        border-radius: 5px; /* Borda arredondada */
        cursor: pointer;
    }
    .confirm-concluid a:last-child {
        background-color: #40a5a8; /* Cor de fundo para o botão "Cancelar" */
    }

    .confirm-concluid .leave {
        padding: 2px 8px;
        background-color: #a84040;
        color: white;
    }
    .form-resend{
        position: fixed; /* Fixa na tela para sobreposição */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.438); /* Fundo semi-transparente */
        color: rgb(0, 0, 0);
        font-size: 24px;
        display: none;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 9999; /* Z-index alto para garantir sobreposição */
    }
    .form-resend form{
        margin: auto;
        width: 80%;
        border-radius: 20px;
        padding: 20px;
        background-color: #fbfbfb;
        display: flex;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.671);
    }
    .form-resend  .button-submit{
        padding: 3px;
        background-color: #40a5a8de;
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
    <ul id="requests-show" class="menu">
        <a href="{{ route('request.show.user') }}"><li class="menu-item">usuario</li></a>
        <a href="{{ route('request.show.artist') }}"><li class="menu-item">artista</li></a>
    </ul> 
    <livewire:request-artist :view="$view" />
    <script>

    </script>
    @livewireScripts
    <script src={{ asset('js/form.js') }}></script>
    <script src={{ asset('js/script.js') }}></script>

</body>
</html>
