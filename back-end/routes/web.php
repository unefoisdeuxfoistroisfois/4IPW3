<?php
/*
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('index'); // Nom du fichier
});

// Page formulaire
Route::get('/custom', function () {
    return view('custom');
});

//Page article
Route::get('/article', function () {
    return view('article');
});
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Test TEMPORAIRE
|--------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\DB;

Route::get('/test-db', function () {
    return DB::connection()->getDatabaseName();
});

/*
|--------------------------------------------------------------------------
| Routes MVC simples
|--------------------------------------------------------------------------
*/

// Page d'accueil index
Route::get('/', [HomeController::class, 'index'])->name('home');

// Page formulaire (custom)
Route::get('/custom', [CustomController::class, 'index'])->name('custom');

// Article statique (Cora)
Route::get('/article', [ArticleController::class, 'cora'])->name('article.cora');

// Article dynamique (DB)
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article');

// Liste des articles (DB)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');

//Page pour les favoris
Route::get('/favoris', function() {
    return view('favoris');
});

//Page pour a propos
Route::get('/apropos', function () {
    return view('apropos');
});

// Route pour recherche le formulaire
Route::get('/search', [ArticleController::class, 'search'])->name('search');

// Route pour sauvegarder les changement d'option de presentation
Route::post('/save-options', [CustomController::class, 'saveOptions'])->name('save-options');