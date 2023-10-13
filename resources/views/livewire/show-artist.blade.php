<div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/search" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pesquisar artistas" name="q">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row justify-content-center">
        @foreach ($users as $artist)
        <div class="col-md-4">
            <div class="user-card">
                <img src="{{$artist->img_user}}" alt="Imagem do Usuário">
                <h2>{{$artist->name}}</h2>
                <p class="tags-container">
                    @foreach ($artist->tags as $tag)
                        <span class="art-style">{{$tag->tag}}</span>
                    @endforeach
                </p>
                <div class="rating">
                    Avaliação:
                    @php
                        $averageRating = $artist->assessmentsAsArtist->avg('rating');
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $averageRating)
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
