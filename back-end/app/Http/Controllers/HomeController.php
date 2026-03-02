<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        /*
         |---------------------------------------------------------
         | On cherche la catégorie "on n'est pas des pigeons"
         |---------------------------------------------------------
         | en recuperant celle ci depuis la table t_category
         */

        $category = Category::where('name_cat', "on n'est pas des pigeons")->first();

        /*
         |---------------------------------------------------------
         | On verifie si la categorie existe
         |---------------------------------------------------------
         | Si la catégorie n'existe pas, on retourne une collection vide
         | afin d'éviter une erreur.
         */

        if (!$category) {
            $articles = collect();
        } else {

            /*
             |-----------------------------------------------------
             | Récupération des articles liés à cette catégorie
             |-----------------------------------------------------
             | - Filtrage par clé étrangère
             | - Tri par date (du plus récent au plus ancien)
             | - Limite à 10 articles maximum comme expliqué dans les specifications
             */

            $articles = Article::where('fk_category_art', $category->id_cat)
                ->orderBy('date_art', 'desc')
                ->limit(10)
                ->get();
        }

        /*
         |---------------------------------------------------------
         | Envoi des articles à la vue index.blade.php
         |---------------------------------------------------------
         */

        return view('index', compact('articles'));
    }
}
