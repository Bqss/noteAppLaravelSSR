<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request as HttpRequest;

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




Route::middleware(["guest"]) -> group(function(){
    Route::get('login', fn () => view("pages/login"))->name("login");
    Route::post('login', [AuthController::class,"login"]);
    Route::get('register', fn () => view("pages/register"));
    Route::post("register", [UserController::class, "create"]);
});

Route::middleware(["auth"]) ->group(function(){
    Route::get("/archive",  [PageController::class,"archive"])->name("archive");
    Route::get("/", [PageController::class, "dashboard"])->name("dashboard");
    Route::post("/", [NoteController::class, "create"]);
    Route::delete("/delete", [NoteController::class, "delete"]);
    Route::post("/detail", [NoteController::class, "detail"]);
    Route::get("/logout", [AuthController::class,"logout"]);
    Route::put("/addToArchive",[NoteController::class,"addToArchive"]);
});





