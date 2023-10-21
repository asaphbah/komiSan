<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/system/icon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>Komisan: Cadastro</title>
    
</head>
<style>
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        width: 95%;
    }

    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .alert-danger li {
        list-style: disc;
        margin-bottom: 5px;
    }
</style>
<body class="body-cadastro">
    <div class="container-img">
        <img src="{{asset('img/system/logo.png')}}" alt="" draggable="false">
    </div>
    <div class="container-cadastro">
        <form action="{{ route('user.store.one') }}" method="POST" id="form-one">
            @csrf
            <div>
                <h1 class="h1-cadastro">Informe seus dados</h1>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Digite seu Nome" required>
                    <span class="error-message" id="name-error"></span>
                </div>
                <div class="input-box">
                    <label for="username">Nome de usuário</label>
                    <input type="text" name="username" placeholder="Digite seu nome de usuário" id="input-username" required>
                    <span class="error-message" id="username-error"></span>
                </div>
                <div class="input-box">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="Ex. komisan@gmail.com" required>
                    <span class="error-message" id="email-error"></span>
                </div>
                <div class="input-box" id="input-birthdate">
                    <label for="birth">Data de nascimento</label>
                    <input type="date" name="birth" placeholder="xx/xx/xxxx" required>
                    <span class="error-message" id="birthdate-error"></span>
                </div>
                <div class="input-box">
                    <label for="password">Senha</label>
                    <input type="password" name="password" placeholder="Digite sua senha" id="password" class="input-password" required>
                    <span class="error-message" id="password-error"></span>
                </div>
                <div class="input-box">
                    <label for="passwordconfirm">Confirme sua senha</label>
                    <input type="password"   placeholder="Confirme sua senha" id="passwordconfirm" class="input-password" required>
                    <span class="error-message" id="passwordconfirm-error"></span>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="button-submit-cadastro">
                <button class="button-submit" type="submit">
                    Próxima
                </button>
            </div>
        </form>
    </div>
    
   <script src={{ asset('js/form.js')}}></script>
</body>
</html>