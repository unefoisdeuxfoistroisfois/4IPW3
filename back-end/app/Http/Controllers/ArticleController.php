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
    */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }
}
