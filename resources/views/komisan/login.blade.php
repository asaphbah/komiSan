<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>Komisan: Login</title>
</head>
<style>
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
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
    
    <div class="container-login">
        <form method="POST" action="{{ route('user.auth') }}">
            @csrf
            <div class="mascot-container">
                <div class="mascot-box">
                    <div class="mascot-circle">
                        <img src="{{asset('img/system/mascote.png')}}" alt="" srcset="" draggable="false">
                    </div>
                    <img src="{{asset('img/system/mascote.png')}}" alt="" srcset="" draggable="false"> 
                </div>
            </div>
            
            <div class="input-group-login">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <h1 class="h1-login">Login</h1>
                <div class="input-box-login">
                    <input type="text" name="username" id="input-username" required>
                    <label for="username">
                        <span>Username</span>
                    </label>
                    
                </div>
                <div class="input-box-login">
                    <input type="password" name="password" id="password-field" required>                    
                    <label for="password">
                        <span>Senha</span>
                    </label>
                </div>
                <span toggle="#password-field" class="toggle-password">Mostrar senha</span>
            </div>
            <div class="button-submit-cadastro">
                <button class="button-submit" type="submit">
                    Entrar
                </button>
            </div>
            <div class="input-box">
                <a class="anchor-donthavean-acount" href="{{route('user.create.one')}}"><span id="donthaveacount-text-color">Não tem uma conta?</span> Cadastre-se aqui</a>
           </div>
        </form>
    </div>
    <script>
        const passwordField = document.querySelector('#password-field');
        const togglePassword = document.querySelector('.toggle-password');
    
        togglePassword.addEventListener('click', function () {
            const fieldType = passwordField.getAttribute('type');
            if (fieldType === 'password') {
                passwordField.setAttribute('type', 'text');
                togglePassword.textContent = 'Ocultar senha';
            } else {
                passwordField.setAttribute('type', 'password');
                togglePassword.textContent = 'Mostrar senha';
            }
        });
    </script>
</body>
</html>