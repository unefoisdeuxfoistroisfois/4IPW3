<?php

namespace App\Http\Controllers;

class CustomController extends Controller
{
    public function index()
    {
        // Affiche la page custom formulaire
        return view('custom');
    }
}
