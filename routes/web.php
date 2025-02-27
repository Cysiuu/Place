<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get("/", fn() => view("home"))->name("home");

Route::get("/explore", fn() => view("explore"))->name("explore");

Route::get("/top-places", fn() => view("top-places"))->name("top-places");

Route::get("/collections", fn() => view("collections"))->name("collections");

Route::get("/near-me", fn() => view("near-me"))->name("near-me");
