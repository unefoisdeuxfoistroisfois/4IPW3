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

    public function saveOptions()
    {
        // Sauvegarde en SESSION
        session([
            'background_color' => request('background_color'),
            'border_color' => request('border_color'),
            'border_style' => request('border_style'),
            'word_break' => request('word_break'),
            'word_spacing' => request('word_spacing'),
            'font_family' => request('font_family'),
        ]);
    
        // Redirige vers la page custom
        return redirect()->route('custom');
    }
}
