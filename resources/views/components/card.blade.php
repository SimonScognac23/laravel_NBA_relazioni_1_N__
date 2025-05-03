<div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100 bulls-card">
        <div class="row g-0 h-100">
            <div class="col-4">
                <img src="{{ Storage::url($article->img) }}" class="img-fluid article-image bulls-image" alt="{{ $article->title }}">
            </div>
            <div class="col-8">
                <div class="card-body d-flex flex-column justify-content-center bulls-body">
                    <h5 class="card-title text-white">{{ $article->name }}</h5>
                    <p class="card-text text-white">Numero: {{ $article->number }}</p>
                    <p class="card-text text-white">Squadra: {{ $article->team }}</p>
                    
                    <!-- 
                        La funzione number_format è utilizzata per formattare il numero in modo che abbia un numero fisso di decimali.
                        Esempi:
                        - number_format(19.5, 2) → 19.50
                        - number_format(19, 2) → 19.00

                        Questo è utile per mantenere il formato uniforme dei prezzi.
                    -->
                    <p class="card-text text-danger fw-bold">Prezzo: €{{ number_format($article->price, 2) }}</p>

                    <!-- Link per modificare l'articolo -->
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-light mt-3">Modifica</a>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        Form per eliminare l'articolo.
        La direttiva @method('DELETE') simula una richiesta HTTP di tipo DELETE.
        Questo è necessario perché i form HTML supportano solo GET e POST.
        Laravel lo utilizza per rispettare le convenzioni RESTful.
    -->
    <form action="{{ route('article.destroy', $article->id) }}" method="POST" class="mt-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>

        <!-- 
            Link per il dettaglio dell'articolo.
            Utilizza la rotta 'article.show' passando l'articolo in modo compatto.
            Lo stile usa Bootstrap 'btn-outline-danger' per un contorno rosso.
        -->
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-outline-danger mt-3">Dettaglio articolo</a>
    </form>
</div>

<!-- 
    Esempio di passaggio dati a un componente:
    player->name è disponibile grazie al binding passato tramite :player="$player" 
    dalla index o da una view contenitore.

    In Laravel Blade, i dati passati tramite i componenti possono essere richiamati 
    direttamente usando la notazione variabile -> proprietà.
-->
