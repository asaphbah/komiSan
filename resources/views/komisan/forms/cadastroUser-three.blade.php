<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkboxes em Linhas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="body-cadastro">
    <div class="container-cadastro">
        <form action="{{route('user.store.three')}}" enctype="multipart/form-data" method="POST" id="form-two">
            <h1>Cadastro (etapa 3)</h1>
            <input type="hidden" name="user_id" value="{{$user->id}}">
            @csrf
            <h2>Preencha as informações adicionais:</h2>
            <div class="input-group">
                <!-- Campo de imagem de usuário -->
                <div class="input-box">
                    <label for="input-user-image">Imagem de Usuário</label>
                    <div class="image-selector">
                        <img id="user-image-preview" src="https://via.placeholder.com/200" alt="Imagem de Usuário">
                        <p>Clique para selecionar uma imagem</p>
                        <input name="img_user" type="file" id="input-user-image" accept="image/*" onchange="updateImagePreview('user-image-preview', 'input-user-image')">
                        <label for="input-user-image">Selecionar Imagem</label>
                    </div>
                    <span class="error-message" id="user-image-error"></span>
                </div>
                <!-- Campo de imagem de capa -->
                <div class="input-box">
                    <label for="input-cover-image">Imagem de Capa</label>
                    <div class="image-selector">
                        <img id="cover-image-preview" src="https://via.placeholder.com/200" alt="Imagem de Capa">
                        <p>Clique para selecionar uma imagem</p>
                        <input name="img_cover" type="file" id="input-cover-image" accept="image/*" onchange="updateImagePreview('cover-image-preview', 'input-cover-image')" required>
                        <label for="input-cover-image">Selecionar Imagem</label>
                    </div>
                    <span class="error-message" id="cover-image-error"></span>
                </div>
                <!-- Campo de bio -->
                <div class="input-box">
                    <label for="input-bio">Bio</label>
                    <textarea id="input-bio" name="bio" rows="4" required placeholder="Digite sua bio"></textarea>
                    <span class="error-message" id="bio-error"></span>
                </div>
                <!-- Campo de artista -->
                <div class="input-box is-artist">
                    <input type="checkbox" id="input-checkbox1" name="artist" value="1">
                    <label for="input-checkbox1">Você é um artista?</label>
                </div>
            </div>
            <div class="button-submit-cadastro">
                <button class="button-submit" type="submit">
                    Finalizar
                </button>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/form.js') }}"></script>
</body>
</html>