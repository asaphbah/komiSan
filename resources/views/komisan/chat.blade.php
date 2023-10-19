<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Discord</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
.menu-chat {
    min-height: 100px;
    width: 100%;
    background-color: #43abae;
    color: white;
    padding: 10px 20px;
    box-sizing: border-box;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed; /* Fixa o elemento no topo */
    top: 0; /* Alinha no topo */
    z-index: 1000; /* Garante que está acima de outros elementos */
}

.menu-chat .user-info {
    display: flex;
    align-items: center;
}

.menu-chat .user-info img {
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.menu-chat .user-info .user-name {
    font-size: 22px;
    font-weight: bold;
}

.menu-chat .post-title {
    font-size: 26px;
    font-weight: bold;
    margin-right: 20px;
}

.container-chat {
    display: flex;
    flex-direction: column;
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    box-sizing: border-box;
}

.chat {
    margin: auto;
    /*pc*/min-width: 800px;
    /*tabletmin-width: 400px;*/
    /*celularmin-width: 0;*/
    max-width: 1200px;
    padding: 10px;
    background-color: #f5f6f7;
    border-radius: 10px;
    margin-bottom: 10px;
}

.chat .message {
    margin-bottom: 20px;
    display: flex;
}

.chat .message.self {
    justify-content: flex-end;
}

.chat .message .user {
    font-weight: bold;
    margin-right: 5px;
}
.chat .message .self .content {
    
}
.self-user .content {
    background-color: #4ccdd1bd;
}
.other-user .content{
    background-color: #cececebd;
}
.chat .message .content {
    padding: 10px;
    border-radius: 5px;
    max-width: 70%; /* Limita a largura máxima da mensagem */
    word-wrap: break-word; /* Quebra as palavras longas para a próxima linha */
}

.input-chat {
    display: flex;
    align-items: center;
}

.input-chat input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.input-chat {
    display: flex;
    align-items: center;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100vw; /* Considerando o padding de 20px em .container */
    background-color: white;
    padding: 10px;
    box-sizing: border-box;
}
.input-chat button {
    background-color: #43aaaee7;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    margin-left: 10px;
    cursor: pointer;
}

.input-chat button:hover {
    background-color: #378c8f;
}

.back-button {
    margin: 5px;
    border: none;
    background-color: #43abae;
    color: white;
    font-weight: bold;
    padding: 0.8rem 2rem;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.3em;
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: #378c8f;
}

.back-button:focus {
    outline: none;
}

/* Adicionando uma transição suave */
.back-button {
    transition: background-color 0.3s ease;
}


</style>
<body>
    <div class="menu-chat">
        <div class="user-info">
            @if ($chat_view->artist->username != auth()->user()->username)
                <img src="{{ asset('storage/' . $chat_view->artist->img_user) }}" alt="Foto do Usuário">
                <div class="user-name">{{$chat_view->artist->name}}</div>
            @else
                <img src="{{ asset('storage/' . $chat_view->user->img_user) }}" alt="Foto do Usuário">
                <div class="user-name">{{$chat_view->user->name}}</div>
            @endif
        </div>
        <div class="post-title">{{$chat_view->title}}</div>
        <a href="{{ route('request.show') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="container-chat">

        <livewire:chat-komisan :id="$chat_view->id" />


    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js">
    const chatContainer = document.querySelector('.chat');
const inputBox = document.querySelector('.input-chat input');

// Função para rolar para a parte inferior do chat
function scrollToBottom() {
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

// Evento para rolagem
chatContainer.addEventListener('scroll', () => {
    if (chatContainer.scrollTop + chatContainer.clientHeight === chatContainer.scrollHeight) {
        inputBox.focus(); // Manter o foco no input quando estiver na parte inferior
    }
});
</script>
</body>
</html>
