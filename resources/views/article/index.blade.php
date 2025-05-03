<x-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">

                @foreach($articles as $article)  
                    <!-- quello che mi ritorna è un dato di tipo collection, che è come un array e ha delle propretà in più -->
                 
                    



<!-- QUI ANDRÒ A RICHIAMARE IL COMPONENTE X-CARD -->
<!-- VOGLIO FARE IN MODO CHE LA CARD VISUALIZZI I DATI CHE $PLAYERS HA AL SUO INTERNO -->
<!-- C’È UN MODO CHE MI PERMETTE DI PASSARE TUTTO L’OGGETTO PLAYER DENTRO LA CARD, 
     E POI LA CARD SARÀ ADIBITA A GESTIRE LE VARIE INFORMAZIONI -->

<!-- PER DIRE A LARAVEL CHE QUELLO CHE ANDRÒ A PASSARE NON È UN DATO SEMPLICE 
     MA UN DATO PIÙ COMPLESSO, UTILIZZO UN SIMBOLO: I DUE PUNTI (:) PRIMA DI PLAYER -->

<!-- I DUE PUNTI INDICANO CHE LA PROPRIETÀ PLAYER NON È UNA STRINGA NÉ UN NUMERO, 
     MA QUALCOSA DI PIÙ COMPLESSO, TENDENZIALMENTE UN ARRAY O UN OGGETTO -->
<!-- COSÌ HO TUTTI I VALORI CHE POSSO RECUPERARE NEL PLAYER, COME AD ESEMPIO 
     NAME, SURNAME, E ANDARLI A INSERIRE SULLA CARD TRAMITE LE GRAFFE -->
<!-- UTILIZZO QUESTA SNTASSI PER PASSARE NEL COMPONENTE TUTTO IL RIFERIMENTO DELL OGGETTO PLAYER SENZA SEPARARE LE VARIE INFORMAZIONI IN SINGOLE PROPRIETà -->
     <x-card :article="$article" />   
     
                    <!-- players è un oggetto e quindi per accedere alle proprietà dell'oggetto all'interno dell'oggetto uso la freccetina -->

                @endforeach

            </div>
        </div>
    </div>

</x-layout>
