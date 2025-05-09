<x-layout>

  <!-- HEADER in stile NBA -->
  <header class="header py-5 bg-nba">
    <div class="container">
      <div class="row align-items-center text-center text-md-start">

        <!-- TESTO A SINISTRA -->
        <div class="col-12 col-md-6 p-4 text-description">
          <h2 class="title-nba mb-3">Una leggenda inizia da qui!</h2>
          <p class="text-nba">
            Torna alle origini del basket NBA, dove ogni passaggio era magia e ogni schiacciata faceva tremare il parquet. 
            Vivi l’epoca d’oro dei Knicks, respira l’adrenalina del Madison Square Garden e preparati a lasciare il segno.  
            Entra in campo, la tua carriera da All-Star ti aspetta!
          </p>
        </div>

        <!-- IMMAGINE A DESTRA -->
        <div class="col-12 col-md-6 p-4 border rounded shadow header-box">
          <img
            src="https://1000logos.net/wp-content/uploads/2017/12/New-York-Knicks-Logo-500x384.png"
            alt="Logo NBA Knicks"
            class="img-fluid mx-auto d-block mb-4 nba-logo"
          />
          <h1 class="text-center title-nba">Area Giocatori Knicks</h1>
        </div>

      </div>
    </div>
  </header>

  <!-- DISPLAY ERRORI (se presenti) -->
  <x-display-errors/>
  <x-display-message/>

  <!-- FORM DI LOGIN con testo motivazionale NBA -->
  <div class="container">
    <div class="row mt-5 justify-content-center text-center">
      
      <!-- COLONNA SOLO PER IL TITOLO -->
      <div class="col-12 col-md-8 mb-4">
        <h2 class="mission-text">Login</h2>
      </div>
    
    </div>

    <!-- FORM DI LOGIN -->
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <form action="{{ route('login') }}" method="POST" class="p-4 border rounded form-nba shadow">
          @csrf

          <!-- CAMPO EMAIL -->
          <div class="mb-3 text-start">
            <label for="email" class="form-label label-nba">Email</label>
            <input type="email" name="email" class="form-control input-nba" id="email" placeholder="Inserisci la tua email">
          </div>

          <!-- CAMPO PASSWORD -->
          <div class="mb-3 text-start">
            <label for="password" class="form-label label-nba">Password</label>
            <input type="password" name="password" class="form-control input-nba" id="password" placeholder="Inserisci la tua password">
          </div>

          <!-- BOTTONE LOGIN stile NBA -->
          <div class="d-grid">
            <button type="submit" class="btn btn-nba btn-lg text-dark">Login</button>
          </div>

        </form>
      </div>
    </div>
  </div>

</x-layout>
