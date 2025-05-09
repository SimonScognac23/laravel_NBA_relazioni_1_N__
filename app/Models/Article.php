<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'team',
        'img',
        'body',
        'price',
        'user_id',
    ];

   /**
     * Get the user that owns the article.
     * user() --> perche riguarda solo UN utente
     * usiamo il metodo belongsTo per recuperare degli utenti
     * IMPORTANTE----->questa istruzione fornita ci da accesso a 2 entità: il metodo user e la proprietà user!! quindi io posso accedere all'utente collegato non con il metodo user ma con la proprietà che ha lo stesso nome di quella relazione
     * IPORTANTE ------> quindi io posso accedere all utente collegato non con il metodo user ma con la proprietà user, questa capacità si chiama traversal model ossia attraversamento del modello
     */
    public function user()
    {
        return $this->belongsTo(User::class);  //questo metodo mi ritorna un oggetto di classe belongsTo
          // Questo metodo ci indica che, quando richiamiamo il metodo user, 
          // ci ritorna l'utente collegato al prodotto
    }
    
}

// visto che doll.article è un oggetto di classe Article possiamo usare il metodo user per recuperare l'id dell'utente per poi andare a inserirlo nella card


