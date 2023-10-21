<div>
        <div class="container-posts">
            <ul class="menu">
                <li class="menu-item"wire:click="process">ocorrendo</li>
                <li class="menu-item"wire:click="pending">Pendentes</li>
                <li class="menu-item"wire:click="concluded">Concluídos</li>
            </ul>
        
        @if ($requests != null)
           @foreach ($requests as $request )
           @if ($request->status == 'P')<!--===================================================PENDENTE======================================-->
                <div class="pedido-card ">
                    <div class="info">
                        @if ($request->reference_img == null)
                            <img class="img-pedido" src="https://via.placeholder.com/200" alt="Imagem de Referência">
                        @else
                            <img class="img-pedido" src="{{ asset('storage/' . $request->reference_img) }}" alt="Imagem de Referência">
                        @endif
                        <div>
                            <div class="title">{{$request->title}}</div>
                            <div class="prazo">Prazo finaliza: {{ $this->getDaysRemaining($request->deadline) }}</div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="order-button" title="Fazer Pedido" onclick="toggleOverlay('{{$request->id}}')"><i class="fas fa-file"></i></button>
            
                        <div>
                            <div class="status">Pendentes</div>
                            <div class="envio">Data de Envio: {{$request->created_at->format('d/m/Y')}}</div>
                        </div>
                    @if ($request->user_id != auth()->user()->id)
                        <button  class="order-button" title="resend" onclick="resend('{{$request->id}}')"><i class="fas fa-pencil-alt"></i></button>
                        <a href="" wire:click="accepted_request({{ $request->id }})" class="order-aceitar order-button" title="Aceitar Pedido"><i class="fas fa-check"></i></a>
                        <a href="" wire:click="recused_request({{ $request->id }})" class="order-recusar order-button" title="Recusar Pedido"><i class="fas fa-times"></i></a>
                    @else
                       <p class="order-button"> Aguardarde <br>respostas....</p>
                       <button  class="order-button" title="resend" onclick="resendShow('{{$request->id}}')"> <i class="fas fa-envelope"></i></button>
                       
                       @if (isset($request->resend))
                            <div class="confirm-concluid" style="display: none" id="resend-show-{{$request->id}}">
                                <div>
                                    <div class="view-header">
                                        <h1>Este foi o reajuste do artista</h1>
                                        <button class="leave" onclick="resendShow('{{$request->id}}')"><i class="fas fa-times"></i></button>
                                    </div>
                                    <p>{{$request->resend->resend}}</p>
                                    <p>{{$request->resend->artist->name}}</p>
                                </div>
                            </div>
                       @endif
                    @endif
                    <div>
                        <div class="form-resend" id="form-resend-{{$request->id}}">
                            <form id="form-resend-validat-{{$request->id}}" action="{{ route('resends.store') }}" method="POST">
                                @csrf
                                <div class="input-box">
                                    <label for="resend">Reenvie o ajuste de proposta</label>
                                    <input type="text" name="resend" id="resend" oninput="sanitizeInput(this)">
                                </div>
                                <span class="error-message" id="resend-{{$request->id}}"></span>
                                <input type="hidden" name="user_id" value="{{$request->user_id}}">
                                <input type="hidden" name="artist_id" value="{{$request->artist_id}}">
                                <input type="hidden" name="request_id" value="{{$request->id}}">
                                <div class="button-submit-cadastro">
                                    <button class="button-submit" type="submit">Enviar reajuste</button>
                                </div>
                                <button class="leave" onclick="resend('{{$request->id}}')"><i class="fas fa-times"></i></button>
                            </form>
                            
                        </div>
                    </div>
                    </div>
                </div>
           @elseif ($request->status == 'A')<!--===================================================ACEITO======================================-->
                <div class="pedido-card ">
                    <div class="info">
                        @if ($request->reference_img == null)
                            <img class="img-pedido" src="https://via.placeholder.com/200" alt="Imagem de Referência">
                        @else
                            <img class="img-pedido" src="{{ asset('storage/' . $request->reference_img) }}" alt="Imagem de Referência">
                        @endif
                        <div>
                            <div class="title">{{$request->title}}</div>
                            <div class="prazo">Prazo finaliza: {{ $this->getDaysRemaining($request->deadline) }}</div>

                        </div>
                    </div>
                    <div class="actions">
                       @if ($request->user_id == auth()->user()->id)
                            <button  onclick="confirmed('{{$request->id}}')" class="order-aceitar order-button" title="Concluir Pedido"> <i class="fas fa-check-circle"></i></button>
                       @endif
                        <div class="confirm-concluid" id="confirm-concluid-{{$request->id}}">
                            <div>
                                <div class="view-header">
                                    <h1>Concluir?</h1>
                                    <button class="leave" onclick="confirmed('{{$request->id}}')"><i class="fas fa-times"></i></button>
                                </div>
                                <p>Tem certeza que deseja concluir o pedido?</p>
                                <a href="{{route('assessments.create', ['id'=> $request->id ])}}" >Sim</a>
                            </div>
                        </div>
                        @php
                            $chat_id = $request->id;
                        @endphp
                        <button  class="order-button" title="Fazer Pedido" onclick="toggleOverlay('{{$request->id}}')"><i class="fas fa-file"></i></button>
                        <a href="{{route('chat.show', ['chat_id'=> $chat_id ])}}" class="order-button" title="Chat"><i class="fas fa-comment"></i></a>

                        <div>
                            <div class="status">Em Processo</div>
                            <div class="envio">Data de Envio: {{$request->created_at->format('d/m/Y')}}</div>
                        </div>
                    </div>
                </div>
           @elseif ($request->status == 'C')<!--===================================================CONCLUI======================================-->
                <div class="pedido-card conclui">
                    <div class="info">
                        @if ($request->reference_img == null)
                            <img class="img-pedido" src="https://via.placeholder.com/200" alt="Imagem de Referência">
                        @else
                            <img class="img-pedido" src="{{ asset('storage/' . $request->reference_img) }}" alt="Imagem de Referência">
                        @endif
                        <div>
                            <div class="title">{{$request->title}}</div>
                            <div class="prazo">Prazo finaliza: {{ $this->getDaysRemaining($request->deadline) }}</div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="order-button" title="Fazer Pedido" onclick="toggleOverlay('{{$request->id}}')"><i class="fas fa-file"></i></button>
                        
                        <div>
                            <div class="status">Concluído</div>
                            <div class="envio">Data de Envio: {{$request->created_at->format('d/m/Y')}}</div>
                        </div>
                    </div>
                </div>
            @else

           @endif
                    <div class="pedido-card-overlay" id="pedido-card-overlay-{{$request->id}}" style="display: none;">
                        <!-- Conteúdo do pedido-card -->
                        <div class="view-request">
                            <div>
                                <div class="view-header">
                                    <h1>Pedido</h1>
                                    <button class="leave" onclick="toggleOverlay('{{$request->id}}')"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="view-group">
                                    <!-- Campo de imagem de referência -->
                                    <div class="input-box container-img">
                                        <div class="image-selector">
                                            @if ($request->reference_img == null)
                                            <img src="https://via.placeholder.com/200" alt="Imagem de Referência">
                                            @else
                                             <img src="{{ asset('storage/' . $request->reference_img) }}" alt="Imagem de Referência">
                                            @endif
                                           
                                        </div>
                                    </div>
                                    <!-- Campo de descrição -->
                                    <div class="list-view">
                                        <div class="input-box">
                                            <label >Descrição</label>
                                            <p>{{$request->description}}</p>
                                        </div>
                                        <!-- Campo de título -->
                                        <div class="input-box">
                                            <label >Título</label>
                                            <p>{{$request->title}}</p>
                                        </div>
                                        <!-- Campo de valor médio -->
                                        <div class="input-box">
                                            <label >Valor Médio</label>
                                            <p>{{$request->total_value}}</p>
                                        </div>
                                        <!-- Campo de prazo -->
                                        <div class="input-box">
                                            <label >Prazo</label>
                                            <p>{{$request->deadline}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        @endif
</div>
