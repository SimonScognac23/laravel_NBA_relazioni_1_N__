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
                    <h1 class="text-white">Crea la tua canotta NBA personalizzata</h1>
                </div>
            </div>
        </div>
    </header>

    <x-display-message />
    <x-display-errors />

    <!-- FORM -->
    <div class="row nba-form-section">
        <div class="col-12 col-md-6 mx-auto">
            <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data" class="nba-form">
                @csrf

                <!-- CAMPO NOME -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold text-primary">Nome della canotta</label>
                    <input 
                        name="name" 
                        value="{{ old('name') }}"
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
                        value="{{ old('number') }}"
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
                        value="{{ old('team') }}"
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
                        value="{{ old('price') }}"
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
    >{{ old('body') }}</textarea>          
</div>



                <!-- CAMPO IMMAGINE -->
                <div class="mb-3">
                    <label for="img" class="form-label fw-bold text-primary">Inserisci immagine della canotta</label>
                    <input 
                        name="img" 
                        type="file" 
                        class="form-control" 
                        id="img"
                    >            
                </div>

               <!-- BOTTONE INVIO -->
                  <button type="submit" class="btn btn-dark text-white w-100">
                      Invia dati
                 </button>

            </form>
        </div>
    </div>

</x-layout>
