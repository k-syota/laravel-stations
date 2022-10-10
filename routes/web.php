<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SheetController;

/*
|-------------------------------------------------------------------------
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

Route::get('practice', function () {
    return response("practice");
});

// Route::get('practice2', function () {
//     $test = "practice2";
//     return response($test);
// });

Route::get('practice3', function () {
    $test = "test";
    return response($test);
});

Route::get('practice', [PracticeController::class,"sample"]);
Route::get('practice2', [PracticeController::class,"sample2"]);
Route::get('practice3', [PracticeController::class,"sample3"]);
Route::get('getPractice', [PracticeController::class,"getPractice"]);

Route::get('admin/movies/index', [MovieController::class,"index"])->name("movie.index");
Route::get('admin/movies/create', [MovieController::class,"create"])->name("movie.create");
Route::post('admin/movies/store', [MovieController::class,"store"]);
Route::get('admin/movies/{id}/edit', [MovieController::class,"edit"])->name("movie.edit");
Route::post('admin/movies/{id}/update', [MovieController::class,"update"])->name("movie.update");
Route::delete('admin/movies/{id}/destroy', [MovieController::class,"destroy"])->name("movie.destroy");
Route::get('sheets', [SheetController::class,"index"])->name("sheet.index");
