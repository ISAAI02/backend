<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/inicio', function () {
    return view('inicio'); 
});
Route::get('/entrega', function () {
    return view('entrega'); 
});
Route::get('/historial', function () {
    return view('historial'); 
});