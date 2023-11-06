<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/system/icon.png')}}" type="image/x-icon">
    <title>Komisan: Cadastro</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="body-cadastro">
    <div class="container-cadastro">
        
        <form action="{{ route('user.store.four')}}" method="POST">
            <h1 class="h1-cadastro">Selecione seus interesses</h1>
            <h2 id="h2-cadastro">Estilos os quais trabalha</h2>
            @csrf

            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="checkbox-container">
                <!-- Checkbox 1 -->
                @foreach ( $tags as $tag )
                <div class="checkbox-item">
                    <input type="checkbox" id="tag{{$tag->id}}" name="tags[]" value="{{$tag->id}}">
                    <label class="checkbox-content" for="tag{{$tag->id}}">
                    @if($tag->imgTag())
                        <img class="checkbox-image" src="{{ asset('storage/' . $tag->imgTag()) }}" alt="Imagem da Tag">
                    @else
                        <img class="checkbox-image" src="https://via.placeholder.com/80" alt="Imagem da Tag">
                    @endif

                      <span class="checkbox-span">{{$tag->tag}}</span>
                  </label>
              </div>
                @endforeach       
            </div>
            <div class="button-submit-cadastro"> 
                <button class="button-submit button-submit2" type="submit">
                    Próxima
                </button>
            </div>
        </form>
    </div>
</body>
</html>