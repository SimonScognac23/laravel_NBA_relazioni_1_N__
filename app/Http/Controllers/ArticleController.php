<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
  //Importiamo la classe Auth per istruire il mio codice nella funzione store per poter accettare come parametro user_id che raccoglie l'id dell'utente

class ArticleController extends Controller
{
    // =========================================================================
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // all'interno del modello posso richiamare diverse operazioni che mi permettono di recuperare le varie informazioni,
        // ovvero i vari Record in questo caso
        $articles = Article::all(); // questo significa fare la query al db SELECT * FROM ARTICLES
        // recupero TUTTI gli articoli all'interno del mio database,
        // richiamo la mia classe Article che è la classe che si mette in comunicazione tra Laravel e il database
        // e le dico di prendere tutti i dati

        return view('article.index', ['articles' => $articles]);
        // ritorna la vista del file index dentro la cartella article
    }

    // =========================================================================
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    // =========================================================================
    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // PRIMO METODO PER CONTROLLARE SE UTENTE HA INSERITO UNA IMMAGINE
        // Metodo per controllare se utente mi ha passato un'immagine, tramite controllo if/else
        /*
        if ($request->file('img')) {
            // MASS ASSIGNMENT
            Article::create([
                'name'   => $request->name,
                'number' => $request->number,
                'team'   => $request->team,
                'price'  => $request->price,
                'body'   => $request->body,
                'img'    => $request->file('img')->store('public/img'),
            ]);
        } else {
            Article::create([
                'name'   => $request->name,
                'number' => $request->number,
                'team'   => $request->team,
                'price'  => $request->price,
                'body'   => $request->body,
            ]);
        }
        */

        // SECONDO METODO PER CONTROLLARE SE UTENTE HA INSERITO UNA IMMAGINE
        // Creo un articolo indifferentemente se l'utente mi ha passato un'immagine,
        // poi controllo se l'utente mi ha passato l'immagine e poi la salvo nel database

        // MASS ASSIGNMENT
        $article = Article::create([
            'name'   => $request->name,
            'number' => $request->number,
            'team'   => $request->team,
            'price'  => $request->price,
            'body'   => $request->body,



            // Qui andremo a inserire il valore dell'utente autenticato
               //Usiamo Auth che è la classe che se l'utente è autenticato viene valorizzato con l'informazione dell'utente.
               //con user accediamo all'utente autenticato e recuperiamol'ID dell'utente e mi ritorna il valore id del'utente
               //!!! importante ---> io sono sicuro che mi ritorna il valore di id perchè ho istruito il mio programma in modo che solo chi è autenticato puo fare la store perchè se la persona non è autenticata non puo andare in crea prodotto,quindi Auth quando entrerà nella funzione store avrà il valore dell'utente registrato ovvero l'id
               // !!!!importante ----->  Quindi quando creo il prodotto con questo modo il prodotto ovvero l'articolo gli viene assegnato automaticamente l'id dell'utente loggato al momento!!
            'user_id' => Auth::user()->id

        ]);

        // arrivato qui il mio valore di img sarà quello di default

        // ora...
        if ($request->file('img')) {
            // Controllo se l'utente mi ha passato l'immagine
            // Se sì, sovrascrivo il valore di default del mio articolo, salvandolo prima dentro una variabile
            // $article sarà l'oggetto di classe Article
            $article->img = $request->file('img')->store('img', 'public');
            $article->save();
        }

        return redirect()->back()->with('successMessage', 'Articolo inserito con successo');
    }

    // =========================================================================
    /**
     * Display the specified resource.  ROTTA PARAMETRICA
     */
    public function show(Article $article)
    {
        // il $article sarà semplicemente l'id che Laravel attraverso un'operazione logica recupera l'id e recupera tutto l'articolo,
        // in realtà scrivere o no $id non è necessario 

        // Utilizziamo compact per passare la variabile article alla vista 'article.show',
        // in modo che la vista possa accedere ai dati dell'articolo, incluso l'ID, e mostrarne i dettagli.
        return view('article.show', compact('article'));
    }

    // =========================================================================
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        // Ritorniamo la vista che conterrà il form del articolo portandoci con la funzione compact tutto l'articolo
        return view('article.edit', compact('article'));
    }

    // =========================================================================
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // Se l'utente passa o no l'immagine i nostri articoli sono studiati per avere una foto di default, avranno sempre un'immagine
        // che sia o quella dell’articolo o quella di default
        // Qui sulla if mi controllo se l'utente mi ha passato l'immagine

        if ($request->file('img')) {
            $img = $request->file('img')->store('img', 'public');
        } else {
            $img = $article->img; // Ossia $img sarà uguale al suo valore originale, cioè quello che era già salvato nel database,
            // ossia l'immagine di default. Questo mi permette di compiere SOLO una volta l'operazione di salvataggio nel DB
            // perché l'utente mi passi o no l'immagine, io avrò una foto, io saprò sempre che il valore di img sarà sempre assegnato
        }

        // Questo articolo deve essere modificato con i dati della request, non utilizzeremo più la classe Article,
        // perché l'articolo da modificare ce l'abbiamo già ed è $article
        // Il metodo update come parametro accetta un array, quindi funziona come il mass assignment.
        // Questa operazione update mi andrà a modificare l'articolo con i nuovi dati

        $article->update([
            'name'   => $request->name,
            'number' => $request->number,
            'team'   => $request->team,
            'price'  => $request->price,
            'body'   => $request->body,
            'img'    => $img,
        ]);

        return redirect(route('article.index'))->with('successMessage', 'Articolo modificato');
    }

    // =========================================================================
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Elimina l'articolo
        $article->delete();

        // Reindirizza con un messaggio di successo
        return redirect()->route('article.index')->with('successMessage', 'Articolo eliminato con successo.');
    }
}
