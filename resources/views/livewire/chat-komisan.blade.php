<div>
    <div class="chat">
        @foreach ($messages as $message)
            @if ($message->user->id == auth()->user()->id)
                <div class="message self">
                    <div class="self-user">
                        <div class="user">Você</div>
                        <div class="content">{{$message->message}}</div>
                        {{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y H:i') }}
                    </div>
                </div>
            @else
                <div class="message">
                    <div class="other-user ">
                        <div class="user">{{$message->user->unsername}}</div>
                        <div class="content">{{$message->message}}</div>
                        {{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y H:i') }}
                    </div>
                </div>                    
            @endif
        @endforeach
        <div class="input-chat">
            <input type="text" wire:model="newMessage" placeholder="Digite sua mensagem">
            <button wire:click="store"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</div>
