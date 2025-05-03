<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
  <div class="container">

    <!-- Logo a sinistra -->
    <a class="navbar-brand fw-bold text-warning" href="#">
      <img src="https://s2.qwant.com/thumbr/474x266/d/e/6009448ec5ae423b28e07adb8bb68de177702a76fbd9cd455acc55eadcfdb0/th.jpg?u=https%3A%2F%2Ftse.mm.bing.net%2Fth%3Fid%3DOIP.bhfDkQyxrlMHOgk_FKH-0gHaEK%26pid%3DApi&q=0&b=1&p=0&a=0.jpg" alt="Logo" style="width: 40px; height: auto; margin-right: 10px;">
      NBA Jersey
    </a>

    <!-- Bottone per il menu mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu di navigazione -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav align-items-center gap-3">

        <!-- Link alla homepage -->
        <li class="nav-item">
          <a class="nav-link fw-semibold text-orange" href="{{ route('home.page') }}">Home</a>
        </li>

        <!-- Link per visualizzare tutte le jersey NBA -->
        <li class="nav-item">
          <a class="nav-link fw-semibold text-light" href="{{ route('article.index') }}">
            Vedi tutte le jersey NBA
          </a>
        </li>

        <!-- Link per creare una nuova jersey -->
        <li class="nav-item">
          <a class="nav-link fw-semibold text-light" href="{{ route('article.create') }}">
            Crea la tua jersey personale
          </a>
        </li>

      </ul>
    </div>

  </div>
</nav>
