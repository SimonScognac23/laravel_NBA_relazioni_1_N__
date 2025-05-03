@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifica Articolo</h2>

    <!-- Mostra il messaggio di errore o successo, se presente -->
    <x-display-message />

    <!-- Bottone per tornare indietro -->
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
        Torna indietro
    </a>


    <!-- Inizio del form per modificare l'articolo -->
    <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $article->name) }}">
        </div>

        <!-- Numero -->
        <div class="mb-3">
            <label for="number" class="form-label">Numero</label>
            <input type="number" class="form-control" id="number" name="number" value="{{ old('number', $article->number) }}">
        </div>

        <!-- Squadra -->
        <div class="mb-3">
            <label for="team" class="form-label">Squadra</label>
            <input type="text" class="form-control" id="team" name="team" value="{{ old('team', $article->team) }}">
        </div>

        <!-- Prezzo -->
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $article->price) }}">
        </div>

        <!-- Descrizione -->
        <div class="mb-3">
            <label for="body" class="form-label">Descrizione</label>
            <textarea class="form-control" id="body" name="body">{{ old('body', $article->body) }}</textarea>
        </div>

        <!-- Bottone di invio -->
        <button type="submit" class="btn btn-primary">Aggiorna Articolo</button>
    </form>
</div>
@endsection

<!-- 
    La direttiva extends in Blade viene utilizzata per estendere un layout di base. 
    In questo caso, il layout di base è definito nel file 'layouts.app', che di solito contiene la struttura comune per tutte le pagine dell'applicazione, 
    come il header, il footer e altre sezioni che non cambiano da una pagina all'altra.
    
    La direttiva section definisce una sezione del contenuto che verrà inserita nel layout di base. 
    Nello specifico, qui la sezione 'content' è quella che conterrà il contenuto dinamico per questa pagina specifica.
    In questo caso, il contenuto della pagina sarà il codice che segue il tag section, ovvero tutto ciò che è compreso tra section('content') e endsection.
    
    Quando il layout di base viene caricato, Laravel sostituirà questa sezione con il contenuto specifico di questa vista (quella che stiamo creando).
    
    In breve:
    - extends è usato per ereditare un layout di base.
    - section definisce una sezione di contenuto che andrà a sostituire una parte del layout di base.
    Questo rende il codice più modulare e riutilizzabile, separando la logica di layout da quella di contenuto.
-->


  <!-- 
        url()->previous() è una funzione di Laravel che restituisce l'URL della pagina precedente visitata dall'utente. 
        Questo è utile per creare un bottone "Torna indietro", simile al comportamento del pulsante "Back" del browser.
        Quando l'utente clicca sul link, verrà reindirizzato alla pagina da cui è arrivato, rendendo la navigazione più fluida.
    -->
