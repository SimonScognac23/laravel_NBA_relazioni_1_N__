<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Esegue la migration: aggiunge la colonna 'user_id' alla tabella 'articles'
     * e imposta una chiave esterna verso la tabella 'users'.
     */
    public function up(): void


    {



        Schema::table('articles', function (Blueprint $table) {
            // Aggiunge una colonna 'user_id' di tipo intero grande senza segno (unsignedBigInteger)
            // che rappresenta la chiave esterna per la relazione One to Many (1:N) con la tabella 'users'.
            // 'user_id' è al singolare perché si riferisce a un singolo utente.
            //usiamo nullable per evitare che i prodotti gia creati non entrino in conflitto per il fatto che non vengono associati a nessun id, oppure anche default(1) che di solito è l utente amministratore
            $table->unsignedBigInteger('user_id')->nullable()->after('id');




//---------------------VINCOLO REFERENZIALE = DEFINIZIONE DI C.ESTERNA------------------------------------------------------------------------------------//


            //Questi metodi definiscono la foreign key della tabella articles collegata alla tabella users tramite i loro id specifici
            // Definisce la chiave esterna che collega 'user_id' alla colonna 'id' della tabella 'users'.
            // foreign() indica che 'user_id' è una chiave esterna.
            // references('id') specifica che 'user_id' fa riferimento alla colonna 'id' della tabella 'users'.
            // on('users') definisce la tabella di riferimento.

            
            // onDelete('cascade') indica che, se un record nella tabella 'users' viene eliminato,
            // tutti i record associati nella tabella corrente (es. 'articles') che fanno riferimento
            // a quel 'user_id' verranno eliminati automaticamente.
            // Questo mantiene l'integrità referenziale del database evitando record "orfani".

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }


 //---------------------------FUNZIONE DOWN -----------------------------------------------------------------------------------//
    /**
     * Annulla la migration: rimuove la colonna 'user_id' e la relativa chiave esterna dalla tabella 'articles'.
     */

     // Per la funzione down dobbiamo ragionare partendo da l'ultima operazione della funzione up, in questo caso è definire una foreign key
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            //Il dropforeign ha lo scopo di andare a rompere il vincolo referenziale della colonna user_id

            $table->dropColumn('user_id');  //Elimina la colonna creata
         
        });
    }
};
