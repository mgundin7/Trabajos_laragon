<?php

use App\Http\Controllers\controladorpractica;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CocheExtraController;

Route::middleware("guest")->group(function ()
{
    Route::get('/login', [AuthController::class, 'f_index'])->name('login');
    Route::post('/login', [AuthController::class, 'f_login'])->name('login_autenticar');
    Route::get('/registro', [AuthController::class, 'f_registro'])->name('registro');
    Route::post('/registro', [AuthController::class, 'f_registro_guardar'])->name('registro_guardar');
});

Route::middleware("auth")->group(function ()
{
    Route::get('/', function () {return view("index");});
    Route::get('/nosaltres', function () {return view("nosaltres");});
    Route::get('/onestem', function () {return view("onestem");});

    Route::get('/insertar',[controladorpractica::class, 'f_formulari'])->name('dades-insertar');
    Route::post('/insertar',[controladorpractica::class, 'f_insert'])->name('dades-insertar');

    Route::get('/buscar', [controladorpractica::class, 'f_formulari_buscar'])->name('dades-buscar');
    Route::post('/buscar', [controladorpractica::class, 'f_buscar'])->name('dades-buscar');

    Route::get('/consultar',[controladorpractica::class,'f_consultar'])->name('dades-consultar');
    Route::get('/consultar/{fila}',[controladorpractica::class,'f_consultardetalle'])->name('dades-consultar');

    Route::get('/borrar', [controladorpractica::class, 'f_borrar'])->name('dades-borrar');
    Route::delete('/borrar/{fila}',[controladorpractica::class, 'f_borrarfila'])->name('dades-borrarfila');

    Route::get('/modificar',[controladorpractica::class, 'f_modificar'])->name('dades-modificar');
    Route::get('/modificar/{fila}',[controladorpractica::class, 'f_modificarfila'])->name('dades-modificarfila');
    Route::patch('/modificar/{fila}',[controladorpractica::class, 'f_actualitzarfila'])->name('dades-actualitzarfila');

    // Relación N:M coches - extras
    Route::get('consultartaules', [CocheExtraController::class, 'consultartaules'])->name('ce.consultar');
    Route::get('insertarextras', [CocheExtraController::class, 'insertarextras'])->name('ce.insertarForm');
    Route::post('insertarextras', [CocheExtraController::class, 'guardarextras'])->name('ce.insertar');

    Route::get('/logout', [AuthController::class, 'f_logout'])->name('logout');
});