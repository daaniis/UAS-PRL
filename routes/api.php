<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Agama29Controller;
use App\Http\Controllers\api\User29Controller;

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

Route::get("/user29", [User29Controller::class, "getUsers29"]);
Route::get("/user29/{id}", [User29Controller::class, "getUserDetail29"]);
Route::put("/user29/{id}", [User29Controller::class, "putUserDetail29"]);
Route::put("/user29/{id}/photo", [User29Controller::class, "putUserPhoto29"]);
Route::put("/user29/{id}/photoKTP", [User29Controller::class, "putUserPhotoKTP29"]);
Route::put("/user29/{id}/password", [User29Controller::class, "putUserPassword29"]);
Route::put("/user29/{id}/status", [User29Controller::class, "putUserStatus29"]);
Route::put("/user29/{id}/agama", [User29Controller::class, "putUserAgama29"]);
Route::delete("/user29/{id}", [User29Controller::class, "deleteUser29"]);

Route::get("/agama29", [Agama29Controller::class, "getAgama29"]);
Route::get("/agama29/{id}", [Agama29Controller::class, "getDetailAgama29"]);
Route::post("/agama29", [Agama29Controller::class, "postAgama29"]);
Route::put("/agama29/{id}", [Agama29Controller::class, "putAgama29"]);
Route::delete("/agama29/{id}", [Agama29Controller::class, "deleteAgama29"]);



