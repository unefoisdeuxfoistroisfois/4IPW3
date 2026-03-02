<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | cora()
    |--------------------------------------------------------------------------
    | Affiche une page article statique (exemple : l'article Cora).
    | Cette page ne dépend pas de la base de données.
    */
    public function cora()
    {
        // Démarrer la session PHP si pas encore démarrée
        if (!session_id()) {
            session_start();
        }

        // ============================
        // GESTION STATISTIQUE
        // ============================

        // ID fictif pour l'article Cora (par exemple "cora")
        $id = 'cora';

        // Initialiser le tableau de stats si nécessaire
        if (!isset($_SESSION['article_clicks'])) {
            $_SESSION['article_clicks'] = [];
        }

        // Incrémenter le compteur
        if (!isset($_SESSION['article_clicks'][$id])) {
            $_SESSION['article_clicks'][$id] = 0;
        }
        $_SESSION['article_clicks'][$id]++;

        // Calculer le total de clics
        $_SESSION['total_clicks'] = array_sum($_SESSION['article_clicks']);

        // ============================

        return view('article');
    }

    /*
    |--------------------------------------------------------------------------
    | index()
    |--------------------------------------------------------------------------
    | Affiche la liste des articles (récupérés depuis la base de données).
    | paginate(10) = 10 articles par page, pour ne pas tout afficher d'un coup.
    */
    public function index()
    {
        $articles = Article::orderBy('date_art', 'desc')->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /*
    |--------------------------------------------------------------------------
    | show($id)
    |--------------------------------------------------------------------------
    | Affiche un article précis depuis la base de données.
    | $id vient de l'URL : /article/{id}
    | AVEC gestion statistique des clics (superglobal SESSION)
    |
    | Laravel session() :
    | session()->put('key', 'value');
    | $value = session()->get('key');
    |
    | Superglobal $_SESSION :
    | $_SESSION['key'] = 'value';
    | $value = $_SESSION['key'];
    */
    public function show($id)
    {
        // Démarrer la session PHP si pas encore démarrée
        if (!session_id()) {
            session_start();
        }

        // Récupère l'article depuis la DB
        $article = Article::findOrFail($id);

        // ============================
        // GESTION STATISTIQUE
        // ============================

        // Initialiser le tableau de stats si nécessaire
        if (!isset($_SESSION['article_clicks'])) {
            $_SESSION['article_clicks'] = [];
        }

        // Incrémenter le compteur pour cet article
        if (!isset($_SESSION['article_clicks'][$id])) {
            $_SESSION['article_clicks'][$id] = 0;
        }
        $_SESSION['article_clicks'][$id]++;

        // Calculer le total de clics
        $_SESSION['total_clicks'] = array_sum($_SESSION['article_clicks']);

        // ============================

        return view('articles.show', compact('article'));
    }

    /*
    |--------------------------------------------------------------------------
    | search()
    |--------------------------------------------------------------------------
    | recherche article
    */
    public function search()
    {
        $keyword = request('keyword');

        // recherche dans title_art et hook_art
        $articles = Article::where('title_art', 'LIKE', "%{$keyword}%")
                           ->orWhere('hook_art', 'LIKE', "%{$keyword}%")
                           ->orderBy('date_art', 'desc')
                           ->limit(10)
                           ->get();

        return view('search_results', compact('articles', 'keyword'));
    }
}
