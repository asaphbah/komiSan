<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<style>
    .report-body{
        width: 100%;
        height: 100%;
        justify-content: center;
        display: flex;
        padding: 0;
        background-color: rgba(218, 211, 198, 0.255);
    }
    .report-table{
        width: 90%;
        height: 100vh;
       
    }
    table{
        margin: auto;
    }
    thead, th, tbody{
        padding: 10px;
        border: 1px solid black;
    }
    th{
        min-width: 100px;
        max-height: 300px;
        font-size: 16px;
        color: #333;
        max-width: 300px;
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
    <div class="report-body">   
        <div class="report-table">
            <table>
                <thead>
                    <th>usuario que reporto<br>(username)</th>
                    <th>Tag reportada<br>(nome da tag)</th>
                    <th>justificativa extra</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ( $reports as $report)
                    <tr>
                        <th>
                            <a href="{{route('profile.komisan',['username' => $report->user->username])}}">{{ $report->user->name}}</a>
                        </th>
                        <th>
                            <a href="{{route('tag.show',['tagShow' => $report->tag->tag])}}">{{$report->tag->tag}}</a>
                        </th>
                        <th>
                            {{$report->report_text}}
                        </th>
                        <th>
                            <a href=""  class="order-recusar order-button" title="Recusar Pedido"><i class="fas fa-times"></i></a>
                        </th>
                    </tr>     
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src={{ asset('js/script.js') }}></script>
</body>
</html>