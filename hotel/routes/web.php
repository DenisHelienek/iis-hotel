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

Route::get('/profil', 'HomeController@profil')->name('profil');
Route::get('/manager', 'HomeController@manager')->name('Manazer');
Route::get('/manager/{id}', 'HomeController@manager_change')->name('Manazer');
Route::get('/manager/i/{id}', 'HomeController@manager_i')->name('Manazer');
Route::get('/manager/d/{id}', 'HomeController@manager_d')->name('Manazer');

Route::get('/manager2', 'HomeController@manager2')->name('Manazer2');

Route::get('/reception', 'HomeController@reception')->name('Reception');
Route::get('/reservation/{idr}', 'HomeController@reservation')->name('reservation');
Route::post('/reservation', 'HomeController@post')->name('post');

Route::get('/domov', 'HomeController@index')->name('domov');
