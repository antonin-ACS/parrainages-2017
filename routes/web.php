<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/insert","InsertController@insert");

Route::get("/","AccueilController@accueil");

Route::get("/candidat/{id}","CandidatController@showCandidat");

Route::get("/candidats","CandidatController@showAllCanditats");

Route::get("/parrains","ParrainController@showAllParrains");