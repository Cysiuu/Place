<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/explore', function () {
    return view('explore',[
        'places' => [
            [
                'name' => 'Bali',
                'image' => 'bali.jpg',
                'description' => 'Bali is a province of Indonesia and the westernmost of the Lesser Sunda Islands. Located east of Java and west of Lombok, the province includes the island of Bali and a few smaller neighbouring islands, notably Nusa Penida, Nusa Lembongan, and Nusa Ceningan.',
                'rating' => 4.5,
                'review_count' => 1000,
                'price' => 40
            ],
            [
                'name' => 'Paris',
                'image' => 'paris.jpg',
                'description' => 'Paris is the capital and most populous city of France, with an estimated population of 2,148,271 residents as of 2020, in an area of more than 105 square kilometres. Since the 17th century, Paris has been one of Europe\'s major centres of finance, diplomacy, commerce, fashion, science and arts.',
                'rating' => 4.8,
                'review_count' => 1500,
                'price' => 60
            ],
            [
                'name' => 'New York',
                'image' => 'new-york.jpg',
                'description' => 'New York City (NYC), often simply called New York, is the most populous city in the United States. With an estimated 2019 population of 8,336,817 distributed over about 302.6 square miles (784 km2), New York is also the most densely populated major city in the United States.',
                'rating' => 4.7,
                'review_count' => 1200,
                'price' => 50
            ]
        ]
    ]
    );
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


