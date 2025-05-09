

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number'); 
            $table->string('team'); 
            $table->string('price');            
            

          
            // Questo sarà il BODY del nostro articolo
            $table->text('body');



            // Il comando DEFAULT ci permette di andare a inserire un valore prescelto
            // nel momento in cui l'utente non inserisca un valore nel form.
            // Quindi, nel momento in cui si inserisce l'immagine, se l'utente non ha messo l'immagine
            // lui andrà a inserire un valore di default.
            // Il valore di default deve essere un'immagine che abbiamo nel nostro progetto.

            $table->string('img')->default('imgArticles/default/default.jpg');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
