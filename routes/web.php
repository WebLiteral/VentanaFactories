<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Artwork;

Route::get('/', function () {

    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/gallery', function () {
    $artworks = Artwork::with('collection')->paginate(10);
    return view('gallery', [
        'artworks' => $artworks
    ]);
});

Route::get('/artwork/{id}', function ($id) {


    $artwork = Artwork::find($id);

    return view('artwork', ['artwork' => $artwork]);
});
