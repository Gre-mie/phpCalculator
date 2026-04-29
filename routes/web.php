<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
Route::get('/', function () {
    return view('setup-name');
});*/
Route::view('/', 'setup-name');

/*
Route::get('/setup-items', function () {
    return view('setup-items');
});*/
Route::view('/setup-items', 'setup-items');
Route::post('/setup-items', function (Request $req) {
    $name = $req->input('name');
    return view('setup-items', ['name'=>$name]);
});

/*
Route::get('/till-basket', function () {
    return view('till-basket');
});*/
Route::view('till-basket', 'till-basket');
Route::post('/till-basket', function (Request $req) {
    $name = $req->old('name');
    $croissant = $req->input('croissant');
    $victoriaSponge = $req->input('victoria-sponge');
    $bread = $req->input('bread');
    $muffin = $req->input('muffin');
    $scone = $req->input('scone');
    $bakewellTart = $req->input('bakewell-tart');

    return view('till-basket', [
        'croissant'=>$croissant,
        'victoriaSponge'=>$victoriaSponge,
        'bread'=>$bread, 'muffin'=>$muffin,
        'scone'=>$scone,
        'bakewellTart'=>$bakewellTart
    ]);
});



