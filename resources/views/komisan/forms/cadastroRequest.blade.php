<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Pedido</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="body-cadastro">
    <div class="container-cadastro">
        <form id="form-request" action="{{route('store.request')}}" method="POST" onsubmit="return validateForm(event)" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="artist_id" value="{{$artist}}">
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <h1>Enviar Pedido</h1>
            <div class="input-group">
                
                <!-- Campo de imagem de referência -->
                <div class="input-box container-img">
                    <label for="input-reference-image">Imagem de Referência</label>
                    <div class="image-selector">
                        <img id="reference-image-preview" src="https://via.placeholder.com/200" alt="Imagem de Referência">
                        <p>Clique para selecionar uma imagem</p>
                        <input name="reference_img" type="file" id="input-reference-image" accept="image/*" onchange="updateImagePreview('reference-image-preview', 'input-reference-image')">
                        <label for="input-reference-image">Selecionar Imagem</label>
                    </div>
                </div>
                <!-- Campo de descrição -->
                <div class="input-box">
                    <label for="input-description">Descrição</label>
                    <textarea id="input-description" name="description" rows="4" placeholder="Digite a descrição do pedido" required></textarea>
                    <span class="error-message" id="request-description"></span>
                </div>
                <!-- Campo de título -->
                <div class="input-box">
                    <label for="input-title">Título</label>
                    <input type="text" id="input-title" name="title" placeholder="Digite o título do pedido" required>
                    <span class="error-message" id="request-title"></span>
                </div>
                <!-- Campo de valor médio -->
                <div class="input-box">
                    <label for="input-average-value">Valor Médio</label>
                    <input type="number" name="total_value" id="input-average-value" placeholder="Digite o valor médio do pedido" required>
                    <span class="error-message" id="request-total-value"></span>
                </div>
                <!-- Campo de prazo -->
                <div class="input-box">
                    <label for="input-deadline">Prazo</label>
                    <input type="date" name="deadline" id="input-deadline" required>
                    <span class="error-message" id="request-deadline"></span>
                </div>
           
            <div class="button-submit-pedido">
                <button class="button-submit" type="submit">
                    Enviar Pedido
                </button>
            </div>
        </form>
    </div>

    <!-- JavaScript para atualizar a imagem de visualização -->
    <script src={{ asset('js/form.js') }}></script>
    <script src={{ asset('js/script.js') }}></script>
</body>
</html>
