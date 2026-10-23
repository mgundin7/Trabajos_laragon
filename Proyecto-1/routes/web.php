<?php
use app\Http\Controllers\elmeucontrolador;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view("index");});
Route::get('/p1', function () {return view("pagina1");});
Route::get('/p2', function () {return view("pagina2");});
Route::get('/insertar', function () {return view("insertar");});

//Route::get('/', function () {
//    return view('welcome');
//});
