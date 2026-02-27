<?php

use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('index');
});

// Page formulaire
Route::get('/custom', function () {
    return view('custom');
});

//Page article
Route::get('/article', function () {
    return view('article');
});

