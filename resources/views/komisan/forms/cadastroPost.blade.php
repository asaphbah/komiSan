<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/system/icon.png')}}" type="image/x-icon">
    <title>Criar Post</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
            <li><a class="selected-anchor" href="{{ route('post.create') }}">Postar</a></li>
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
    <div class="container-postar">
        <!-- Coluna do Post Principal -->
        <div class="post-column">
            <div class="post-principal">
                <!-- Conteúdo do Post Principal aqui -->
                <img id="previewImage" src="" alt="Imagem do Post Principal">
                <div class="post-content">
                    <div class="post-header">
                        <div class="user-photo"><img src="{{ asset('storage/' . auth()->user()->img_user) }}" alt="Foto do Usuário"></div>   
                        <div class="user-name">{{auth()->user()->username}}</div>
                        <button class="follow-button">Seguir</button>
                    </div>
                    <h2 id="exampleTitle">Título do Post Principal</h2>
                    <p class="post-comment" id="exampleComment">Este é o comentário do post principal.</p>
                    <!-- Botão de Curtir (Like) -->
                    <button class="like-button liked" title="Curtir">
                        <i class="fas fa-heart"></i>
                    </button>

                    <span class="likes-count">X likes</span>
                    <div id="exampleTags">
                        <span class="art-style">ilustração</span>
                        <span class="art-style">exemplo</span>
                        <span class="art-style">tag</span>
                        <span class="art-style">pintura</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coluna do Formulário -->
        <div class="form-column">
            <div class="input-group postar-input-group">
                <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="post-form" id="form-post" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-box">
                        <label for="postTitle">Título do Post</label>
                        <input type="text" id="postTitle" name="postTitle" placeholder="Digite um título para a sua postagem" oninput="updateExample('exampleTitle', this.value)" required>
                        <span class="error-message" id="post-title"></span>
                    </div>
                    <div class="input-box">
                        <label for="postComment">Descrição do Post</label>
                        <textarea id="postComment" name="postComment" placeholder="Digite uma descrição para a sua postagem" rows="4" oninput="updateExample('exampleComment', this.value)" required></textarea>
                        <span class="error-message" id="post-coment"></span>
                    </div>
                    <div class="input-postar">
                        <label for="postImage">Imagem do Post</label>
                        <input type="file" id="postImage" name="img_post" accept="image/*" onchange="updateImagePreview(this)" required>
                    </div>
                    <div class="input-postar-2">
                        <label for="postImage">Selecionar uma imagem</label>
                    </div>
                    <div class="input-box">
                        <label for="postTags">Tags</label>
                        <input type="text" id="postTags" placeholder="Use a # para separar cada tag. Exemplo: #pintura #pixelart" name="postTags" oninput="updateTags('exampleTags', this.value)" required>
                        <span class="error-message" id="post-tags"></span>
                    </div>
                    <div class="button-submit-cadastro">
                        <button class="button-submit" type="submit">
                            Postar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src={{ asset('js/form.js') }}></script>
    <script src={{ asset('js/script.js') }}></script>
</body>
</html>
