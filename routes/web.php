<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/explore', function () {
    return view('explore');
})->name('explore');

Route::get('/top-places', function () {
    return view('top-places');
})->name('top-places');

Route::get('/collections', function () {
    return view('collections');
})->name('collections');

Route::get('/near-me', function () {
    return view('near-me');
})->name('near-me');


