
    <!-- MESSAGGIO DI SUCCESSO SE PRESENTE -->
    @if (session()->has('successMessage'))  <!-- if per il controllo se c'è una sessione di nome successMessage allora creami un div -->
        <div class="alert alert-success">
            {{ session('successMessage') }} <!-- richiamiamo all'interno il nome della sessione -->
        </div>
    @endif
