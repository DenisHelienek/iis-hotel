<?php

Route::get('/', function () {
    return view('domov');
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
Route::get('/ubytovanie', 'Nonauth@rooms')->name('ubytovanie');
Route::get('/wellness', 'Nonauth@wellness')->name('wellness');
Route::get('/profil{id}', 'HomeController@profil')->name('profil');
Route::get('/profil2/{id}', 'HomeController@profil2')->name('profil2');
Route::get('/profil/d/{id}', 'HomeController@detail')->name('detail');
Route::get('/manager', 'HomeController@manager')->name('Manazer');
Route::get('/manager/{id}', 'HomeController@manager_change')->name('Manazer');
Route::get('/manager/i/{id}', 'HomeController@manager_i')->name('Manazer');
Route::get('/manager/d/{id}', 'HomeController@manager_d')->name('Manazer');
Route::get('/manager2', 'HomeController@manager2')->name('Manazer2');
Route::get('/reception', 'HomeController@reception')->name('Reception');
Route::get('/reception2', 'HomeController@reception2')->name('Reception2');
Route::get('/reception3', 'HomeController@reception3')->name('Reception3');
Route::post('/post/reservation', 'HomeController@postres')->name('postres');
Route::post('/post/reservation/book{id}', 'HomeController@book')->name('book');
Route::get('/reservation/{idr}', 'HomeController@reservation')->name('reservation');
Route::post('/post{room}/p{id}', 'HomeController@post')->name('post');
Route::get('/domov', 'HomeController@index')->name('domov');
