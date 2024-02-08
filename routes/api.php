<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\RetraitController;
use App\Http\Controllers\API\RechargeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("register", [ApiController::class, "register"]);
Route::post("login", [ApiController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"]
], function(){

    Route::get("profile", [ApiController::class, "profile"]);
    Route::post("logout", [ApiController::class, "logout"]);
});

// Routes pour RechargeController
Route::get('/recharges_en_cours', [RechargeController::class, 'getRechargesEnCours']);
Route::get('/recharges_valides', [RechargeController::class, 'getRechargesValides']);
Route::get('/recharges_echoues', [RechargeController::class, 'getRechargesEchoues']);

// Routes pour RetraitController
Route::get('/retraits_en_cours', [RetraitController::class, 'getRetraitsEnCours']);
Route::get('/retraits_valides', [RetraitController::class, 'getRetraitsValides']);
Route::get('/retraits_echoues', [RetraitController::class, 'getRetraitsEchoues']);

// Routes pour les méthodes de RechargeController filtrées par utilisateur authentifié
Route::get('/recharges_en_cours_utilisateur', [RechargeController::class, 'getRechargesEnCoursUtilisateur']);
Route::get('/recharges_valides_utilisateur', [RechargeController::class, 'getRechargesValidesUtilisateur']);
Route::get('/recharges_echoues_utilisateur', [RechargeController::class, 'getRechargesEchouesUtilisateur']);

// Routes pour les méthodes de RetraitController filtrées par utilisateur authentifié
Route::get('/retraits_en_cours_utilisateur', [RetraitController::class, 'getRetraitsEnCoursUtilisateur']);
Route::get('/retraits_valides_utilisateur', [RetraitController::class, 'getRetraitsValidesUtilisateur']);
Route::get('/retraits_echoues_utilisateur', [RetraitController::class, 'getRetraitsEchouesUtilisateur']);