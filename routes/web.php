<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\WatchController;
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

Route::middleware("guest")->group(function () {
    Route::get("/", [IndexController::class, "index"])
        ->name("index");

    Route::get("register", [RegisterController::class, "index"])
        ->name("register");
    Route::post("register", [RegisterController::class, "store"]);

    Route::get("login", [LoginController::class, "index"])
        ->name("login");
    Route::post("login", [LoginController::class, "login"]);
});

Route::middleware("auth")->group(function () {
    Route::post("logout", [LoginController::class, "logout"])
        ->name("logout");

    Route::get("browse", [BrowseController::class, "index"])
        ->name("browse");

    Route::get("watch/{id}", [WatchController::class, "index"])
        ->name("watch");

    Route::middleware("can:manage content")->group(function () {
        Route::get("categories/edit/{id}", [CategoryController::class, "index"])
            ->name("categories/edit");
        Route::post("categories/edit/{id}", [CategoryController::class, "edit"]);
        Route::get("categories/delete/{id}", [CategoryController::class, "remove"])
            ->name("categories/delete");
        Route::post("categories/delete/{id}", [CategoryController::class, "delete"]);
        Route::get("categories/create", [CategoryController::class, "create"])
            ->name("categories/create");
        Route::post("categories/create", [CategoryController::class, "store"]);

        Route::get("movies/edit/{id}", [MovieController::class, "index"])
            ->name("movies/edit");
        Route::post("movies/edit/{id}", [MovieController::class, "edit"]);
        Route::get("movies/delete/{id}", [MovieController::class, "remove"])
            ->name("movies/delete");
        Route::post("movies/delete/{id}", [MovieController::class, "delete"]);
        Route::get("movies/create/{id}", [MovieController::class, "create"])
            ->name("movies/create");
        Route::post("movies/create/{id}", [MovieController::class, "store"]);
    });
});
