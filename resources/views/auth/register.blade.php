<x-layout>

  <!-- HEADER a tema 76ers -->
  <header class="header py-5 bg-76ers">
    <div class="container">
      <div class="row justify-content-center align-items-center text-center">
        <div class="col-12 col-md-6 p-4 border rounded shadow" style="background-color: #ffffff;">
          <img
            src="https://s1.qwant.com/thumbr/474x266/3/5/bb46e3c30462072f6a93328ed1ed31c96ab0bd9483e1d5447806d1009e2db4/th.jpg?u=https%3A%2F%2Ftse.mm.bing.net%2Fth%3Fid%3DOIP.QyYthN8pZEZdF42kC-QlVQHaEK%26cb%3Diwp1%26pid%3DApi&q=0&b=1&p=0&a=0.jpg"
            alt="Logo Philadelphia 76ers"
            class="img-fluid mx-auto d-block mb-4 border border-primary rounded"
            style="max-width: 300px;"
          />

          <h1 class="text-76ers fw-bold">Registrati</h1>
        </div>
      </div>
    </div>
  </header>

  <x-display-errors/>
  <x-display-message/>

  <!-- SEZIONE CENTRALE con titolo -->
  <div class="container">
    <div class="row mt-5 justify-content-center text-center">
      <div class="col-12 col-md-8">
        <h1 class="mb-4 text-uppercase fw-bold text-76ers">
          Diventa una leggenda NBA! Allenati con i 76ers e vivi l’epoca di Iverson
        </h1>
      </div>

      <!-- FORM DI REGISTRAZIONE -->
      <!-- Il form invia i dati alla rotta 'register' gestita da Laravel Fortify -->
      <form
        action="{{ route('register') }}" 
        method="POST"
        class="p-4 border rounded bg-white shadow form-76ers"
        
      >
        @csrf <!-- Protezione CSRF obbligatoria in Laravel -->

        <!-- Campo email dell'utente -->
        <div class="mb-3 text-start">
          <label for="email" class="form-label label-76ers">Email</label>
          <input type="email" name="email" class="form-control input-76ers" id="email" placeholder="Inserisci la tua email">
        </div>

        <!-- Campo nome dell'utente -->
        <div class="mb-3 text-start">
          <label for="name" class="form-label label-76ers">Nome</label>
          <input type="text" name="name" class="form-control input-76ers" id="name" placeholder="Inserisci il tuo nome">
        </div>

        <!-- Campo password -->
        <div class="mb-3 text-start">
          <label for="password" class="form-label label-76ers">Password</label>
          <input type="password" name="password" class="form-control input-76ers" id="password" placeholder="Crea una password sicura">
        </div>

        <!-- Conferma password -->
        <div class="mb-4 text-start">
          <label for="password_confirmation" class="form-label label-76ers">Conferma Password</label>
          <input type="password" name="password_confirmation" class="form-control input-76ers" id="password_confirmation" placeholder="Ripeti la password">
        </div>

        <!-- Pulsante di invio -->
        <div class="d-grid">
          <button type="submit" class="btn btn-dark btn-lg text-white fw-bold">Entra in campo</button>
        </div>

      </form>
    </div>
  </div>

</x-layout>
