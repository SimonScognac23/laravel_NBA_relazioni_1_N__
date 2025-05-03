<x-layout>

  <div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100 article-body-card">
      <div class="card-header article-body-header">
        {{ $article->body }}
      </div>
    </div>
  </div>

  <!-- Bottone per tornare indietro -->
  <div class="mt-3">
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Torna indietro</a>
  </div>

</x-layout>


<!-- 
  url()->previous() restituisce l'URL della pagina visitata precedentemente.
  È utile per creare pulsanti "Torna indietro", sfruttando l'header HTTP referer.
-->
