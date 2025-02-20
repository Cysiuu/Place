<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/explore', function () {
    return view('explore');
});

Route::get('/top-places', function () {
    return view('top-places');
});

Route::get('/collections', function () {
    return view('collections');
});

Route::get('/near-me', function () {
    return view('near-me');
});



