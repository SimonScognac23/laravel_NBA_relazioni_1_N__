<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

// Rotta iniziale che restituisce la vista 'welcome'
Route::get('/', function () {
    return view('welcome');
})->name('home.page');


// ARTICLE CONTROLLER------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 



// Rotta CREATE adibita a portarci nel form di creazione di un articolo
// Route::get  --> mostrami una risorsa 
Route::get('/article/create' ,  [ArticleController::class, 'create'] )->name('article.create');



// Rotta EDIT per mostrare il form di modifica di un articolo specifico
// Route::get --> mostra una risorsa esistente da modificare
Route::get('article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');




// Rotta STORE per salvare un nuovo articolo nel database
// Route::post --> invia i dati al server per salvare una nuova risorsa
Route::post('/article/store' ,  [ArticleController::class, 'store'] )->name('article.store');



// Rotta SHOW per mostrare tutti gli articoli
// Route::get --> usata per recuperare una lista di risorse
Route::get('/article/index' ,  [ArticleController::class, 'index'] )->name('article.index');



// Rotta SHOW parametrica per mostrare un singolo articolo
// Posso mettere o {article} oppure {id}, è la stessa cosa, passerà sempre l'id
Route::get('article/show/{article}',  [ArticleController::class, 'show'] )->name('article.show');




// Rotta DESTROY per eliminare un articolo specifico
// Route::delete --> usata per cancellare una risorsa
Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');







// Rotta UPDATE per aggiornare un articolo esistente
// Route::put --> invia i dati al server per aggiornare una risorsa esistente
Route::put('article/{id}', [ArticleController::class, 'update'])->name('article.update');
