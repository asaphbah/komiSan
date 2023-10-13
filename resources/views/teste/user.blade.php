<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Meu Perfil do Instagram</title>
    <link rel="stylesheet" href="style.css">
    <style>
       
      /* Estilos iniciais para dispositivos móveis */
/* Defina os estilos para dispositivos móveis aqui */

/* Reset de estilos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilos gerais para dispositivos móveis */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f0f0f0;
    margin: 0;
}

/* Estilo do header comum para dispositivos móveis */
header {
    background-color: #43abae;
    color: #fff;
    padding: 10px 0;
    text-align: center;
    height: 8vh;
}

/* Estilo do nav e links comum para dispositivos móveis */
nav ul {
    list-style-type: none;
    display: flex;
    justify-content: center;
    gap: 20px;
}

nav a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    transition: color 0.3s;
}

nav a:hover {
    color: #00f;
}

/* Estilos específicos para o Instagram Profile para dispositivos móveis */
.container-instagram {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    padding-top: 0;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

/* Estilo da imagem de capa para dispositivos móveis */
.profile-cover {
    width: 100%;
    height: 300px;
    background-image: url("https://i.pinimg.com/564x/c9/35/21/c935218d66ae58d3aafe49ef4a906e40.jpg");
    background-size: cover;
    background-position: center;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    position: relative;
}

/* Estilo para a foto do usuário para dispositivos móveis */
.profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    border: 5px solid #fff;
    margin-right: 20px;
    position: relative;
    float: left;
    margin-top: -75px;
    margin-left: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Estilo para o nome do usuário para dispositivos móveis */
.user-info h1 {
    font-size: 24px;
    margin: 10px 0;
    display: block;
    color: #333;
}

/* Limpa o float para evitar que elementos subsequentes fiquem ao lado da foto */
.user-info:after {
    content: "";
    display: table;
    clear: both;
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Estilo para a seção de informações do usuário para dispositivos móveis */
.user-info {
    text-align: center;
    margin-top: 20px;
    color: #333;
}

.user-info h1 {
    font-size: 24px;
    margin: 10px 0;
}

.follow-button {
    padding: 10px 20px;
    background-color: #43abae;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

.follow-button:hover {
    background-color: #00f;
}

/* Estilo para a seção de estatísticas do usuário para dispositivos móveis */
.user-stats {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    list-style: none;
    padding: 0;
    color: #333;
}

.user-stats li {
    text-align: center;
    margin-right: 20px;
}

.user-stats strong {
    font-weight: bold;
}

/* Estilo para a descrição do perfil para dispositivos móveis */
.bio {
    margin-top: 20px;
    background-color: #ffffff;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    color: #333;
}

.bio h3 {
    font-size: 18px;
    margin: 0;
}

/* Estilo para a classificação e avaliação do usuário para dispositivos móveis */
.rating-container {
    text-align: center;
    margin-top: 20px;
    color: #333;
}

.rating-stars {
    font-size: 24px;
}

.star {
    color: #ffcc00;
    margin: 0 5px;
}

.user-rating {
    font-size: 24px;
    color: #ffcc00;
    margin-top: 10px;
    font-weight: bold;
}

.user-rating-text {
    font-size: 18px;
    margin-top: 10px;
}

/* Estilo para as abas de navegação para dispositivos móveis */
.tabs {
    height: 10vh;
    display: flex;
    justify-content: space-around;
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.tabs button {
    flex: 1;
    padding: 10px;
    border: none;
    background-color: transparent;
    cursor: pointer;
    font-weight: bold;
    color: #333;
    border-bottom: 2px solid transparent;
    transition: border-color 0.3s;
}

.tabs button.active {
    border-color: #333;
}

/* Estilo para a grade de posts para dispositivos móveis */
.grid-posts-container {
    width: 100%;
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

/* Estilização do post para dispositivos móveis */
.post {
    flex: 0 0 calc(50% - 20px); /* Alteração para 2 posts por linha */
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
    color: #333;
}

.post:hover {
    transform: translateY(-5px);
}

/* Alinhar o conteúdo à esquerda para dispositivos móveis */
.post img {
    max-width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.post .post-title {
    font-weight: bold;
    margin-top: 10px;
    font-size: 20px;
}

.post .post-description {
    margin-top: 5px;
    font-size: 16px;
}

.like-button {
    width: auto;
    display: flex;
    align-items: center;
    gap: 5px;
    cursor: pointer;
    margin-top: 20px;
}

/* Aumentar o ícone de curtir para dispositivos móveis */
.like-icon {
    font-size: 24px;
    color: #f00;
}

/* Estilização do cabeçalho do post para dispositivos móveis */
.post-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 10px;
    color: #333;
}

.user-info img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.user-nickname {
    font-weight: bold;
    font-size: 18px;
}

.post-options {
    position: relative;
}

.options-button {
    font-size: 24px;
    cursor: pointer;
}

/* Estilização do dropdown para dispositivos móveis */
.post-options:hover .dropdown-content {
    display: block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    right: 0;
    top: 100%;
}

.dropdown-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    color: #333;
    transition: background-color 0.3s;
}

.dropdown-content a:hover {
    background-color: #f2f2f2;
}

/* Estilização das especializações ou tags para dispositivos móveis */
.specializations {
    text-align: center;
    margin: 20px 0px;
    color: #333;
}

.specializations h3 {
    font-size: 18px;
    margin: 0;
}

.specialization-tags {
    margin-top: 10px;
}

.specialization-tag {
    background-color: #43abae;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    margin-right: 5px;
    font-weight: bold;
    font-size: 14px;
    display: inline-block;
}

.rating-link {
    text-decoration: none;
    display: inline-block;
    background-color: #43abae;
    color: #fff;
    padding: 8px 16px;
    border-radius: 5px;
    margin-top: 20px;
    font-weight: bold;
    transition: background-color 0.3s;
    text-align: center;
    white-space: nowrap;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s, font-size 0.3s, box-shadow 0.3s; /* Transições suaves */
}

.rating-link i {
    font-size: 24px;
    vertical-align: middle;
    margin-right: 8px;
}

.rating-link:hover {
    background-color:  #5cc0c4; /* Nova cor de fundo ao passar o mouse */
    color: #fff; /* Cor do texto em destaque */
    font-size: 16px; /* Tamanho do texto maior ao passar o mouse */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.548); /* Sombra suave */
}

/* Adicione uma media query para telas maiores (laptops e dispositivos similares) */
@media (min-width: 769px) {
    /* A partir deste ponto, adicione estilos para laptops e dispositivos maiores */
    body {
        font-size: 18px; /* Aumento de fonte para laptops */
    }

    .container-instagram {
        padding: 20px; /* Aumento do espaço de preenchimento para laptops */
    }

    .profile-cover {
        height: 400px; /* Aumento da altura da imagem de capa para laptops */
    }

    /* Adicione mais ajustes de estilo para laptops conforme necessário */
}

    </style>
</head>
<body>
    <!-- Cabeçalho comum -->
    <header>
        <nav>
            <ul>
                <!-- Adicione seus links aqui -->
            </ul>
        </nav>
    </header>

    <!-- Instagram Profile -->
    <div class="container-instagram">
        <!-- Imagem de capa -->
        <div class="profile-cover"></div>
        
        <!-- Foto do usuário -->
        <div class="profile-picture">
            <img src="https://i.pinimg.com/564x/3d/e0/c3/3de0c353a4c3071d3354ef2e9da79d32.jpg" alt="Nome do Usuário">
        </div>

        <section class="profile">
            <div class="user-info">
                <h1>Nome do Usuário</h1>
                <button class="follow-button">Seguir</button>
            </div>
            <div class="profile-info">
                <ul class="user-stats">
                    <li><strong>1000</strong> posts</li>
                    <li><strong>10M</strong> seguidores</li>
                    <li><strong>1000</strong> seguindo</li>
                </ul>
                <div class="bio">
                    <h3>Descrição do perfil</h3>
                    <p>Excelente usuário com uma paixão por compartilhar momentos incríveis.</p>
                </div>
                <div class="rating-container">
                    <div class="rating-stars">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                    </div>
                    <span class="user-rating">Excelente usuário</span>
                    <p class="user-rating-text">Usuário confiável com conteúdo incrível!</p>
                    
                    <!-- Ícone de seta e link para a tela de avaliações do usuário -->
                    <a href="" class="rating-link">
                        <span>Ver Avaliações</span>
                        <i class="material-icons">keyboard_arrow_right</i> <!-- Ícone de seta -->
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Especializações ou Tags -->
        <div class="specializations">
            <h3>Especializações</h3>
            <div class="specialization-tags">
                <span class="specialization-tag">Pixel Art</span>
                <span class="specialization-tag">Realista</span>
                <span class="specialization-tag">Cyberpunk</span>
                <span class="specialization-tag">Fantasia</span>
                <!-- Adicione mais tags conforme necessário -->
            </div>
        </div>

        <div class="tabs">
            <button class="active">Posts</button>
            <button>Posts Curtidos</button>
            <button>Posts Favoritos</button>
        </div>
        <div class="grid-posts-container">
            <!-- Exemplo de post 1 -->
            <div class="post">
                <div class="post-header">
                    <div class="user-info">
                        <img src="https://i.pinimg.com/564x/3d/e0/c3/3de0c353a4c3071d3354ef2e9da79d32.jpg" alt="Nome do Usuário">
                        <span class="user-nickname">Nome do Usuário</span>
                    </div>
                    <div class="post-options">
                        <span class="options-button">&#9881;</span>
                        <div class="dropdown-content">
                            <a href="#">Editar</a>
                            <a href="#">Excluir</a>
                        </div>
                    </div>
                </div>
                <img src="https://i.pinimg.com/564x/3d/e0/c3/3de0c353a4c3071d3354ef2e9da79d32.jpg" alt="Descrição do Post 1">
                <div class="post-title">Título do Post 1</div>
                <div class="post-description">Descrição do Post 1.</div>
                <div class="like-button">
                    <span class="like-icon">&#9829;</span>
                    <span>Curtir</span>
                </div>
            </div>

            <!-- Exemplo de post 2 -->
            <div class="post">
                <div class="post-header">
                    <div class="user-info">
                        <img src="https://i.pinimg.com/564x/3d/e0/c3/3de0c353a4c3071d3354ef2e9da79d32.jpg" alt="Nome do Usuário">
                        <span class="user-nickname">Nome do Usuário</span>
                    </div>
                    <div class="post-options">
                        <span class="options-button">&#9881;</span>
                        <div class="dropdown-content">
                            <a href="#">Editar</a>
                            <a href="#">Excluir</a>
                        </div>
                    </div>
                </div>
                <img src="https://i.pinimg.com/564x/3d/e0/c3/3de0c353a4c3071d3354ef2e9da79d32.jpg" alt="Descrição do Post 2">
                <div class="post-title">Título do Post 2</div>
                <div class="post-description">Descrição do Post 2.</div>
                <div class="like-button">
                    <span class="like-icon">&#9829;</span>
                    <span>Curtir</span>
                </div>
            </div>
            <!-- Adicione mais posts aqui conforme necessário -->
        </div>
    </div>
</body>
</html>
