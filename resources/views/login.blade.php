<div class="container-posts">
    <ul class="menu">
        <li class="menu-item">Em Processo</li>
        <li class="menu-item">Pendentes</li>
        <li class="menu-item">Concluídos</li>
    </ul>

    

    @foreach ($requests as $request )

    <div class="pedido-card ">
        <div class="info">
            <img src="https://picsum.photos/200" alt="Imagem do Pedido" class="img-pedido">
            <div>
                <div class="title">{{$request->title}}</div>
                <div class="prazo">Prazo:  {{calcularPrazo($request->deadline) }} dias</div>
            </div>
        </div>
        <div class="actions">

            <button class="order-button" title="Fazer Pedido" onclick="toggleOverlay('{{$request->id}}')"><i class="fas fa-file"></i></button>

            <div>
                <div class="status">Pendente</div>
                <div class="envio">Data de Envio: {{$request->created_at->format('d/m/Y')}}</div>
            </div>
            <a href="" class="order-aceitar order-button" title="Aceitar Pedido"><i class="fas fa-check"></i></a>
            <a href="" class="order-recusar order-button" title="Recusar Pedido"><i class="fas fa-times"></i></a>
        </div>
    </div>
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
                                    <img src="https://via.placeholder.com/200" alt="Imagem de Referência">
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