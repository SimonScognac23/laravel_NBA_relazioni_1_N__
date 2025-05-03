<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
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

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // Verifica se il file è presente
        if ($request->hasFile('img')) {
            // Se il file è presente e valido, lo salviamo
            $imgPath = $request->file('img')->store('img', 'public');
        } else {
            // Se il file non è presente, usiamo il valore predefinito
            $imgPath = 'imgArticles/default/default.jpg';  // Percorso relativo dell'immagine predefinita
        }

        // Mass Assignment: creiamo un nuovo articolo con i dati della request
        Article::create([
            'name' => $request->name,
            'number' => $request->number,
            'body' => $request->body,
            'img' =>  $imgPath,  // Salviamo il percorso dell'immagine
            'price' => $request->price,
            'team' => $request->team,
        ]);

        // Ritorna al form con un messaggio di successo
        return redirect()->back()->with('successMessage', 'Articolo inserito con successo');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     /**
     * Display the specified resource.  ROTTA PARAMETRICA
     */
    public function show(Article $article)  // il article sarà semplicemente l'id che lv attraverso un operazione logica recupera l'id e recupera tutto l'articolo, in realta scrivere o no $id non è necessario 
    {
      
        // Logica per mostrare un articolo specifico (non implementata ancora)
    return view('article.show', compact('article')); 
        // Utilizziamo compact per passare la variabile article alla vista 'article.show',
        // in modo che la vista possa accedere ai dati dell'articolo, incluso l'ID, e mostrarne i dettagli.

    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Recupera l'articolo con l'ID specificato
        $article = Article::findOrFail($id);
    
        // Passa l'articolo alla vista per mostrare i dati nel form
        return view('article.edit', compact('article'));
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function update(Request $request, $id)
    {
        // Il metodo findOrFail cerca un record nel database usando l'ID specificato.
        // Se trova il record, lo restituisce come oggetto Article.
        // Se NON lo trova, Laravel lancia automaticamente una eccezione 404 (ModelNotFoundException),
        // mostrando all'utente la pagina "Not Found".
        $article = Article::findOrFail($id);
        
        // Il metodo validate applica le regole di validazione ai dati inviati dal form.
        // Se un campo non rispetta le regole (es. obbligatorio, formato numerico...), Laravel 
        // reindirizza automaticamente alla pagina precedente con i messaggi di errore.
        $validatedData = $request->validate([
            'name' => 'nullable|string',  // Il campo "name" è facoltativo e deve essere una stringa
            'number' => 'nullable|integer',  // Il campo "number" è facoltativo e deve essere un numero intero
            'team' => 'nullable|string',  // Il campo "team" è facoltativo e deve essere una stringa
            'price' => 'nullable|numeric',  // Il campo "price" è facoltativo e deve essere numerico
            'body' => 'nullable|string',  // Il campo "body" è facoltativo e deve essere una stringa
           
        ]);
    

    
        // Aggiorna i dati dell'articolo nel database con i dati validati (inclusa l'immagine aggiornata)
        $article->update($validatedData);
    
        // Reindirizza alla lista degli articoli con un messaggio di successo
        return redirect()->back()->with('successMessage', 'Articolo inserito con successo');
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function destroy(Article $article)
    {
        // Elimina l'articolo
        $article->delete();

        // Reindirizza con un messaggio di successo
        return redirect()->route('article.index')->with('successMessage', 'Articolo eliminato con successo.');
    }
}
