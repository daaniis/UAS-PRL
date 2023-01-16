<?php

use App\Http\Controllers\User29Controller;
use App\Http\Controllers\Agama29Controller;
use App\Http\Controllers\apiclient\Agama29Controller as ClientAgama29Controller;
use App\Http\Controllers\apiclient\User29Controller as ClientUser29Controller;
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

//welcome page
Route::get('/', function () {
    return redirect('/login29');
});

Route::group(['middleware' => ['isNotLogin']], function () {
    // Register Login
    Route::view('/register29', 'register');
    Route::view('/login29', 'login');
    Route::post('/register29', [App\Http\Controllers\Register29Controller::class, 'register29']);
    Route::post('/login29', [App\Http\Controllers\Login29Controller::class, 'login29']);
});

// Role Admin
Route::group(['middleware' => ['isAdmin']], function () {

    // API DATA USER
    Route::get('/dashboard29', [User29Controller::class, 'dashboardPage29']);
    Route::get('/user29/{id}', [User29Controller::class, 'detailPage29']);
    Route::get('/user29/{id}/status', [User29Controller::class, 'putUserStatus29']);
    Route::post('/user29/{id}/agama', [User29Controller::class, 'putUserAgama29']);
    Route::get('/user29/{id}/delete', [User29Controller::class, 'deleteUser29']);

    // API AGAMA
    Route::get("/agama29", [Agama29Controller::class, "agamaPage29"]);
    Route::post("/agama29", [Agama29Controller::class, "createAgama29"]);
    Route::get("/agama29/{id}/edit", [Agama29Controller::class, "editAgamaPage29"]);
    Route::post("/agama29/{id}/update", [Agama29Controller::class, "updateAgama29"]);
    Route::get("/agama29/{id}/delete", [Agama29Controller::class, "deleteAgama29"]);

    // API CLIENT DATA USER
    Route::get("/apiclient/dashboard29", [ClientUser29Controller::class, "dashboardPage29"]);
    Route::get("/apiclient/user29/{id}", [ClientUser29Controller::class, "detailPage29"]);
    Route::get("/apiclient/user29/{id}/status", [ClientUser29Controller::class, "putUserStatus29"]);
    Route::post("/apiclient/user29/{id}/agama", [ClientUser29Controller::class, "putUserAgama29"]);
    Route::get("/apiclient/user29/{id}/delete", [ClientUser29Controller::class, "deleteUser29"]);

    // API CLIENT AGAMA
    Route::get("/apiclient/agama29", [ClientAgama29Controller::class, "agamaPage29"]);
    Route::get("/apiclient/agama29/{id}/edit", [ClientAgama29Controller::class, "editAgamaPage29"]);
    Route::post("/apiclient/agama29", [ClientAgama29Controller::class, "createAgama29"]);
    Route::post("/apiclient/agama29/{id}/update", [ClientAgama29Controller::class, "updateAgama29"]);
    Route::get("/apiclient/agama29/{id}/delete", [ClientAgama29Controller::class, "deleteAgama29"]);


});


// Role User
Route::group(['middleware' => ['isUser']], function () {

    // API User
    Route::view('/changePassword29', 'editPW');
    Route::get('/profile29', [User29Controller::class, 'profilePage29']);
    Route::post('/user29', [User29Controller::class, 'putUserDetail29']);
    Route::post('/user29/photo', [User29Controller::class, 'putUserPhoto29']);
    Route::post('/user29/photoKTP', [User29Controller::class, 'putUserPhotoKTP29']);
    Route::post('/user29/password', [User29Controller::class, 'putUserPassword29']);

    // API Client User
    Route::view('/apiclient/changePassword29', 'editPW', ['Use_API' => true]);
    Route::get('/apiclient/profile29', [ClientUser29Controller::class, 'profilePage29']);
    Route::post('/apiclient/user29', [ClientUser29Controller::class, 'putUserDetail29']);
    Route::post('/apiclient/user29/photo', [ClientUser29Controller::class, 'putUserPhoto29']);
    Route::post('/apiclient/user29/photoKTP', [ClientUser29Controller::class, 'putUserPhotoKTP29']);
    Route::post('/apiclient/user29/password', [ClientUser29Controller::class, 'putUserPassword29']);


});

// Welcome Page
Route::get('/halo29', [App\Http\Controllers\Halo29Controller::class, 'halo29']);

// Logout Session
Route::get('/logout29', [User29Controller::class, 'logout29'])->middleware('isLogin');
