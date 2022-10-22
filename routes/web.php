<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ScheduleController;
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


Route::prefix('admin/movies')
->group(function(){
    Route::get('index', [MovieController::class,"index"])->name("movie.index");
    Route::get('create', [MovieController::class,"create"])->name("movie.create");
    Route::post('store', [MovieController::class,"store"]);
    Route::get('{id}/edit', [MovieController::class,"edit"])->name("movie.edit");
    Route::get('{id}/', [MovieController::class,"show"])->name("movie.show");
    Route::post('{id}/update', [MovieController::class,"update"])->name("movie.update");
    Route::delete('{id}/destroy', [MovieController::class,"destroy"])->name("movie.destroy");
});

// Route::get('admin/movies/index', [MovieController::class,"index"])->name("movie.index");
// Route::get('admin/movies/create', [MovieController::class,"create"])->name("movie.create");
// Route::post('admin/movies/store', [MovieController::class,"store"]);
// Route::get('admin/movies/{id}/edit', [MovieController::class,"edit"])->name("movie.edit");
// Route::get('admin/movies/{id}/', [MovieController::class,"show"])->name("movie.show");
// Route::post('admin/movies/{id}/update', [MovieController::class,"update"])->name("movie.update");
// Route::delete('admin/movies/{id}/destroy', [MovieController::class,"destroy"])->name("movie.destroy");


Route::prefix('admin')
->group(function(){
    Route::get('schedules/', [ScheduleController::class,"index"])->name("schedule.index");
    Route::get('schedules/{id}/', [ScheduleController::class,"show"])->name("schedule.show");
    Route::get('movies/{id}/schedules/create', [ScheduleController::class,"create"])->name("schedule.create");
    Route::get('schedules/{id}/edit', [ScheduleController::class,"edit"])->name("schedule.edit");
    Route::post('schedules/{id}/update', [ScheduleController::class,"update"])->name("schedule.update");
    Route::delete('schedules/{id}/destroy', [ScheduleController::class,"destroy"])->name("schedule.destroy");
});
// Route::get('admin/schedules/', [ScheduleController::class,"index"])->name("schedule.index");
// Route::get('admin/schedules/{id}/', [ScheduleController::class,"show"])->name("schedule.show");
// Route::get('admin/movies/{id}/schedules/create', [ScheduleController::class,"create"])->name("schedule.create");
// Route::get('admin/schedules/{id}/edit', [ScheduleController::class,"edit"])->name("schedule.edit");
// Route::post('admin/schedules/{id}/update', [ScheduleController::class,"update"])->name("schedule.update");
// Route::delete('admin/schedules/{id}/destroy', [ScheduleController::class,"destroy"])->name("schedule.destroy");

Route::get('sheets', [SheetController::class,"index"])->name("sheet.index");

Route::get('movies/{id}/schedules/{schedule_id}/reservatios/create',[ReservationController::class,"create"])->name("reservation.create");
Route::post('movies/{id}/schedules/{schedule_id}/reservatios/store',[ReservationController::class,"store"])->name("reservation.store");
Route::get('movies/{id}/schedules/{schedule_id}/sheets',[SheetController::class,"index"])->name("sheet.index");
