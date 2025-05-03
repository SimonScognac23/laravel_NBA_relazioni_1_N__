<x-layout>
   
    <!-- Questo è il contenitore principale della vista, dove si troverà il contenuto della pagina -->
    <div class="container py-4">
        
        <!-- yield('content') è una direttiva di Blade che definisce un "segnaposto" per il contenuto dinamico. 
             In altre parole, questa parte del layout è riservata al contenuto che ciascuna vista figlia inserirà 
             quando estenderà questo layout.
             
             La parola 'content' tra parentesi è il nome della sezione che può essere riempita da qualsiasi vista figlia 
             che estende questo layout. Quindi, ogni volta che la vista figlia passerà attraverso questa sezione, 
             il contenuto specifico della vista figlia sostituirà questo `yield('content')`.
             
             Esempio:
             Se una vista figlia ha il contenuto:
                 section('content')
                    <h1>Benvenuti alla homepage!</h1>
                 endsection
             
             Il risultato sarà che il codice della vista figlia sostituirà il `yield('content')` nel layout,
             così la pagina finale mostrerà: 
                 <div class="container py-4">
                     <h1>Benvenuti alla homepage!</h1>
                 </div>
             
             Fondamentalmente, il `yield` è un "segnaposto" per il contenuto che verrà aggiunto da una vista figlia
             quando il layout viene utilizzato.
        -->
        @yield('content')
    </div>

</x-layout>
