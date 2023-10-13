<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Post</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Adicione os estilos CSS aqui */

        /* Estilos do Container */
        .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 12vh auto;
            padding: 20px;
        }

        /* Estilos da Coluna do Post */
        .post-column {
            flex: 1;
            margin-right: 20px;
        }

        /* Estilos do Feed */
        .feed {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        /* Estilos dos Posts */
        .post {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }

        /* Estilos da Imagem do Post */
        .post img {
            max-width: 100%;
            max-height: 400px;
            height: auto;
            display: block;
            object-fit: cover;
            margin: 0 auto;
        }

        /* Estilos do Cabeçalho do Post */
        .post-header {
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .user-photo {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .user-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-name {
            font-weight: bold;
        }

        .follow-button {
            margin-left: auto;
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilos do Post Principal */
        .post-principal {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .post-principal img {
            width: 100%;
            height: auto;
            margin: auto;
            object-fit: cover;
            max-width: 1000px;
            max-height: 1000px;
        }

        .post-principal .post-content {
            padding: 20px;
        }

        .post-principal h2 {
            margin: 0;
            padding: 10px;
            font-size: 24px;
            color: #333;
        }

        .post-principal .post-comment {
            padding: 10px;
            font-size: 18px;
            color: #333;
        }

        /* Estilos do Formulário */
        .form-column {
            flex: 1;
        }

        .post-form {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .preview-post {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .preview-post h2 {
            font-size: 24px;
            margin: 0;
        }

        .preview-post p {
            font-size: 18px;
        }
        .art-style {
            background-color: #43abae;
            color: #fff;
            padding: 6px 10px;
            border-radius: 20px;
            margin-top: 10px;
            display: inline-block; /* Alterado para exibir em linha */
            font-weight: 500;
            margin-right: 5px; /* Adicionado um espaçamento direito entre as tags */
        }

        /* Estilos Responsivos */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .post-column {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
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
                <li><a href="{{ route('user.logout') }}">Sair</a></li>
            @endauth
                </ul>
            </menu>
        </nav>
    </header>
    <div class="container">
        <!-- Coluna do Post Principal -->
        <div class="post-column">
            <article class="post-principal">
                <!-- Conteúdo do Post Principal aqui -->
                <img id="previewImage" src="" alt="Imagem do Post Principal">
                <div class="post-content">
                    <div class="post-header">
                        <div class="user-photo"><img src="https://via.placeholder.com/32x32" alt="Foto do Usuário"></div>
                        <div class="user-name">{{auth()->user()->username}}</div>
                        <button class="follow-button">Seguir</button>
                    </div>
                    <h2 id="exampleTitle">Título do Post Principal</h2>
                    <p class="post-comment" id="exampleComment">Este é o comentário do post principal.</p>
                    <!-- Botão de Curtir (Like) -->
                    <button class="like-button liked" title="Curtir">
                      <i class="fas fa-heart"></i>
                    </button>

                    <span class="likes-count">XXXX likes</span>
                    <div id="exampleTags">
                        <span class="art-style">realista</span>
                        <span class="art-style">fotografia</span>
                        <span class="art-style">4k</span>
                        <span class="art-style">cidade</span>
                    </div>
                </div>
            </article>
        </div>

        <!-- Coluna do Formulário -->
        <div class="form-column">
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
            <form class="post-form" id="form-post" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data"> <!-- Substitua 'seu_script_de_processamento.php' pelo script de processamento real -->
               @csrf
                <div class="form-group">
                    <label for="postTitle">Título do Post:</label>
                    <input type="text" id="postTitle" name="postTitle" oninput="updateExample('exampleTitle', this.value)" required>
                    <span class="error-message" id="post-title"></span>
                </div>
                <div class="form-group">
                    <label for="postComment">Comentário do Post:</label>
                    <textarea id="postComment" name="postComment" rows="4" oninput="updateExample('exampleComment', this.value)" required></textarea>
                    <span class="error-message" id="post-coment"></span>
                </div>
                <div class="form-group">
                    <label for="postImage">Imagem do Post:</label>
                    <input type="file" id="postImage" name="img_post" accept="image/*" onchange="updateImagePreview(this)" required>
                </div>
                <div class="form-group">
                    <label for="postTags">Tags:</label>
                    <input type="text" id="postTags" placeholder="user a # pra separar cada tag, #ex #ex" name="postTags" oninput="updateTags('exampleTags', this.value)" required>
                    <span class="error-message" id="post-tags"></span>
                </div>            
                <div class="button-submit-cadastro">
                    <button class="button-submit" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    
   
    <script src={{ asset('js/form.js') }}></script>
    <script src={{ asset('js/script.js') }}></script>
</body>
</html>
