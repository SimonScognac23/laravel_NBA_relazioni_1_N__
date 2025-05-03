<!-- CODICE PER MOSTRARE ERRORI DI VALIDAZIONE CON IMMAGINE -->
@if ($errors->any())
    <div class="alert alert-danger d-flex align-items-center">
      
        
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
