<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Affiche la page d'accueil index
        return view('index');
    }
}
