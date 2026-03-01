<?php

namespace App\Http\Controllers;

class CustomController extends Controller
{
    public function index()
    {
        // Affiche la page custom formulaire
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
        ]);
    
        // Redirige vers la page custom
        return redirect()->route('custom');
    }
}
