<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\etat_de_stockController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\sortirProduit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inscription');
});

Route::resource('/produits', ProduitController::class);
Route::resource('/agents', AgentController::class);
Route::resource('/services', ServiceController::class);
Route::resource('/sortiProduit', sortirProduit::class);
Route::get('/getAgents', [sortirProduit::class, "getAgents"]);
Route::post('/updateProduct', [sortirProduit::class, 'update']);

Route::resource('/etatS', etat_de_stockController::class);
