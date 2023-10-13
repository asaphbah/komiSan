<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* Estilos exclusivos para a tela de avaliação */
        .form-avaliacao .form-rating {
            text-align: center;
        }

        .form-avaliacao .form-rating .star {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            margin: 0 5px;
        }

        .form-avaliacao .form-rating .star:hover,
        .form-avaliacao .form-rating .star.active {
            color: #ffcc00;
        }
        .select-field {
            appearance: none; /* Remove o estilo padrão do sistema */
            -webkit-appearance: none; /* Para navegadores Webkit, como o Chrome */
            -moz-appearance: none; /* Para navegadores Firefox */
            padding: 8px 30px 8px 10px; /* Ajuste o espaçamento interno conforme necessário */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            background-color: white;
            background-image: url('arrow-down.png'); /* Ícone da seta para baixo */
            background-repeat: no-repeat;
            background-position: right center;
            cursor: pointer;
        }

        /* Estilização das opções <option> */
        .select-field option {
            background-color: white;
        }
    </style>
</head>

<body class="body-cadastro">
    
    <div class="container-cadastro">
        <form action="{{ route('assessments.store') }}" id="form-assessments" method="POST" class="form-avaliacao" onsubmit="return handleSubmit(event);">
            @csrf
            <h1 class="form-title">Avaliação</h1>
            <div class="input-group">
            
                <input type="hidden" name="request_id" value="{{$request->id}}">
                <input type="hidden" name="client_id" value="{{$request->user_id}}">
                <input type="hidden" name="artist_id" value="{{$request->artist_id}}">
                <!-- Campo de avaliação (nota de 1 a 5) -->
                <div class="input-box">
                    <label for="input-rating">Avaliação (de 1 a 5)</label>
                    <input type="hidden" id="input-rating" name="rating" value="0">
                    <div class="form-rating">
                        <span class="star" onclick="handleStarRating(1)">★</span>
                        <span class="star" onclick="handleStarRating(2)">★</span>
                        <span class="star" onclick="handleStarRating(3)">★</span>
                        <span class="star" onclick="handleStarRating(4)">★</span>
                        <span class="star" onclick="handleStarRating(5)">★</span>
                    </div>
                </div>
                <!-- Campo de comentário -->
                <div class="input-box">
                    <label for="input-comment">Comentário</label>
                    <textarea id="input-comment" name="comment" rows="4" placeholder="Digite o comentário" required class="input-field"></textarea>
                     <span class="error-message" id=" assessments-comment"></span>
                </div>
                <!-- Campo de tipo de avaliação -->
                <div class="input-box">
                    <label for="input-review-type">Tipo de Avaliação</label>
                    <select id="input-review-type" name="assessment_type"  required class="select-field">
                        <option value="positiva">Positiva</option>
                        <option value="neutra">Neutra</option>
                        <option value="negativa">Negativa</option>
                    </select>
                </div>
                <span class="error-message" id=" assessments-type"></span>
            </div>
            <div class="button-submit-avaliacao">
                <button class="button-submit" type="submit">
                    Enviar Avaliação
                </button>
            </div>
        </form>

        <!-- Div para exibir os dados após o envio do formulário -->
        <div id="dados-avaliacao" style="display: none;">
            <h2>Dados da Avaliação:</h2>
            <p>Rating: <span id="rating-dados"></span></p>
            <p>Comentário: <span id="comment-dados"></span></p>
            <p>Tipo de Avaliação: <span id="review-type-dados"></span></p>
        </div>
    </div>

    <!-- JavaScript para validação ou outras funcionalidades -->
    <script src={{ asset('js/form.js') }}></script>
    <script src={{ asset('js/script.js') }}></script>
</body>
</html>
