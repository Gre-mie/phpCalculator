<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('setup-name');
});


Route::get('/setup-items', function () {
    return view('setup-items');
});
Route::post('/setup-items', function (Request $request) {
    $name = $request->input('name');
    return view('setup-items', ['name'=>$name]);
});



