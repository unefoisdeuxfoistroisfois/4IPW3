<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class FavorisController extends Controller
{
    // ==========================
    // Affiche la page des favoris
    // ==========================
    public function index()
    {
        // On récupère les IDs stockés en session
        $favoris = session()->get('favoris', []);

        // On récupère les articles correspondants en base
        $articles = Article::whereIn('id_art', $favoris)->get();

        return view('favoris', compact('articles'));
    }

    // ==========================
    // Ajouter un article aux favoris
    // ==========================
    public function add($id)
    {
        // On récupère les favoris existants
        $favoris = session()->get('favoris', []);

        // Si l'article n'est pas déjà dedans
        if (!in_array($id, $favoris)) {
            $favoris[] = $id;
        }

        // On sauvegarde dans la session
        session()->put('favoris', $favoris);

        return back();
    }

    // ==========================
    // Retirer un favori
    // ==========================
    public function remove($id)
    {
        $favoris = session()->get('favoris', []);

        // On enlève l'ID
        $favoris = array_diff($favoris, [$id]);

        session()->put('favoris', $favoris);

        return back();
    }
}
