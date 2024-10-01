<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Artworks;

Route::get('/', function () {

    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/gallery', function () {
    return view('gallery', ['artworks' => Artworks::all()]);
});

Route::get('/artwork/{id}', function ($id) {


    $artwork = Artworks::find($id);

    return view('artwork', ['artwork' => $artwork]);
});
