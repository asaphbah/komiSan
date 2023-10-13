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
        
        <form action="{{ route('user.store.two')}}" method="POST">
            <h1>Cadastro (etapa 2)</h1>
            <h2><p>Defina tanto as tags que você gosta de ver como as que caso você for artista gosta de trabalha</p></h2>
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
                    proxima
                </button>
            </div>
        </form>
    </div>
</body>
</html>