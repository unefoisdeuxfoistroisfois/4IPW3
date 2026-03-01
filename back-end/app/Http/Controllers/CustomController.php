<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   // Permets de récupérer les données du formulaire
use App\Models\Article;        // Permets d'utiliser le modèle Article (table t_article)

class CustomController extends Controller
{
    // ==============================
    // Affiche la page du formulaire
    // ==============================
    public function index()
    {
        // Cette fonction ne fait qu'afficher la vue custom.blade.php
        return view('custom');
    }

<<<<<<< HEAD
    // ==============================
    // Fonction qui traite la recherche
    // ==============================
    public function search(Request $request)
    {
        // Requête sur la table t_article
        // On ne récupère rien tout de suite, on construit la requête petit à petit
        $query = Article::query();

        // ------------------------------
        // 🔎 Recherche dans le TITRE
        // ------------------------------
        if ($request->filled('titre-motscles')) {

            // LIKE permet de chercher un mot dans une phrase
            // Les % signifient : "contient ce mot quelque part"
            $query->where(
                'title_art',
                'LIKE',
                '%' . $request->input('titre-motscles') . '%'
            );
        }

        // ------------------------------
        // 🔎 Recherche dans le CONTENU
        // ------------------------------
        if ($request->filled('corps-motscles')) {

            $query->where(
                'content_art',
                'LIKE',
                '%' . $request->input('corps-motscles') . '%'
            );
        }

        // ------------------------------
        // 🔎 Filtrer par DATE
        // ------------------------------
        if ($request->filled('date')) {

            $query->whereDate(
                'date_art',
                $request->input('date')
            );
        }

        // ------------------------------
        // 🔎 TRI DES RÉSULTATS
        // ------------------------------
        if ($request->input('trier') == 'ancien-recents') {

            // Du plus ancien au plus récent
            $query->orderBy('date_art', 'asc');
        } else {

            // Par défaut : du plus récent au plus ancien
            $query->orderBy('date_art', 'desc');
        }

        // ------------------------------
        // 🔎 LIMITER LE NOMBRE D’ARTICLES
        // ------------------------------
        // Si l'utilisateur n'a rien mis → on affiche 10 articles
        $limit = $request->input('nombre-articles') ?? 10;

        // On exécute la requête avec la limite
        $articles = $query->limit($limit)->get();

        // On envoie les résultats vers une nouvelle vue
        return view('search-results', compact('articles'));
=======
    public function saveOptions()
    {
        // Sauvegarde en SESSION
        session([
            'background_color' => request('background_color'),
            'border_color' => request('border_color'),
            'border_style' => request('border_style'),
            'word_break' => request('word_break'),
            'word_spacing' => request('word_spacing'),
        ]);
    
        // Redirige vers la page custom
        return redirect()->route('custom');
>>>>>>> 53d22f8e0ab9b8c5c11144c5918e2983683c9c3e
    }
}
