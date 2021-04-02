<?php

use App\Http\Controllers\WhoIsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting/{id}', function (Request $request, string $id) {

    return 'Hello World ' . $id;
});

Route::get('/user/{name?}', function ($name = null) {
    return $name;
});
Route::redirect("/google", "https://google.com");

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "Admin Users";
    })->name('users');
});

route::get('/whois/{id}', [WhoIsController::class, 'show']);
