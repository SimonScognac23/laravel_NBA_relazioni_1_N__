<x-layout>





    <!-- HEADER -->
    <header class="nba-header">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <!-- Logo NBA -->
                    <img src="https://upload.wikimedia.org/wikipedia/en/0/03/National_Basketball_Association_logo.svg" 
                         alt="Logo NBA" 
                         class="img-fluid nba-logo">
                    <h1 class="text-white">Modifica l'articolo : {{$article->name}} </h1>
                </div>
            </div>
        </div>
    </header>

    <x-display-message />
    <x-display-errors />

    <!-- FORM 
    1 Sfruttamo il VALUE per recuperare i dati che vogliamo modificare
    2 Per img abbiamo due div
    3 sfruttamo la route article.update
    4 sfruttiamo la direttiva method per fare un override del metodo di base del form
    5 usiamo METHOD che è una direttiva di laravel che sta ad indicare ad un form che deve sovrascrivere la richiesta rispetto alla richiesta impostata di default all'interno del form
    6 e all'interno delle tonde gli passiamo il metodo corretto che il form dovra portarsi con se al momento della richiesta e in questo caso è il metodo PUT
    -->
    <div class="row nba-form-section">
        <div class="col-12 col-md-6 mx-auto">
            <form method="POST" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data" class="nba-form">

                @method('PUT')  <!--l'override del metodo da POST A PUT è detto Spoofing -->
                @csrf

                <!-- CAMPO NOME -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold text-primary">Nome della canotta</label>
                    <input 
                        name="name" 
                        value="{{ $article->name }}"
                        type="text" 
                        class="form-control" 
                        id="name"
                    >            
                </div>

                <!-- CAMPO NUMERO -->
                <div class="mb-3">
                    <label for="number" class="form-label fw-bold text-primary">Numero della canotta</label>
                    <input 
                        name="number" 
                        value="{{ $article->number }}"
                        type="number" 
                        step="1"
                        class="form-control" 
                        id="number"
                    >            
                </div>

                <!-- CAMPO TEAM -->
                <div class="mb-3">
                    <label for="team" class="form-label fw-bold text-primary">Team della maglia</label>
                    <input 
                        name="team" 
                        value="{{ $article->team }}"
                        type="text" 
                        class="form-control" 
                        id="team"
                    >            
                </div>

                <!-- CAMPO PREZZO -->
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold text-primary">Prezzo della canotta (€)</label>
                    <input 
                        name="price" 
                        value="{{ $article->price }}"
                        type="number"
                        step="0.01"
                        class="form-control" 
                        id="price"
                    >            
                </div>

                <!-- CAMPO DESCRIZIONE -->
                <div class="mb-3">
                    <label for="body" class="form-label fw-bold text-primary">Descrizione</label>
                    <textarea 
                        name="body" 
                        class="form-control" 
                        id="body"
                        rows="3"
                    >{{ $article->body }}</textarea>          
                </div>

                <!--IMMAGINE ATTUALE 
                La passiamo tramite lo storage e all'interno la recuperiamo con l'article-->
                <div class="mb-3">
                <span class="form-label fw-bold text-primary">Immagine attuale:</span>
                <img src=" {{Storage::url( $article->img )}} " alt="">
                </div>

                <!-- IMMAGINE NUOVA DA INSERIRE -->
                <div class="mb-3">
                    <label for="img" class="form-label fw-bold text-primary">Inserisci nuova immagine della canotta</label>
                    <input 
                        name="img" 
                        type="file" 
                        class="form-control" 
                        id="img"
                    >            
                </div>

               <!-- BOTTONE MODIFICA -->
                  <button type="submit" class="btn btn-dark text-white w-100">
                      Modifica dati
                 </button>

            </form>
        </div>
    </div>

</x-layout>
