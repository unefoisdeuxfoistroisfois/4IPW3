<?php

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

//Page pour les favoris
Route::get('/favoris', function() {
    return view('favoris');
});

//Page pour a propos
Route::get('/apropos', function () {
    return view('apropos');
});
