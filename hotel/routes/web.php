<?php

Route::get('/', function () {
    return view('domov');
});

Route::get('/ubytovanie', function () {
    return view('ubytovanie');
});

Route::get('/restauracia', function () {
    return view('restauracia');
});

Route::get('/wellness', function () {
    return view('wellness');
});

Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::get('/registracia', function () {
    return view('registracia');
});

Route::get('/prihlasenie', function () {
    return view('prihlasenie');
});








Auth::routes();

Route::get('/domov', 'HomeController@index')->name('home');
