<?php

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

use App\Http\Controllers\UserController;

Route::redirect("/", "user/signup");

Route::prefix('user')->group(function () {
    Route::match(["GET", "POST"], "signup", [UserController::class, "signup"]);
});

Route::prefix('admin')->group(function () {
    Route::get("/", [UserController::class, "users"]);
});