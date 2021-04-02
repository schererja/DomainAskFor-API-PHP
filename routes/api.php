<?php

use App\Http\Controllers\SynonymController;
use App\Http\Controllers\WhoIsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
route::get('/v1/synonyms/{id}', [SynonymController::class, 'show']);
route::get('/v1/whois/{id}', [WhoIsController::class, 'show']);
