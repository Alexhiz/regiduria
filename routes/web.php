<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\UbicationController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\LudotecaController;
use App\Http\Controllers\MarimbaController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\LockerroomController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::resource('admin/estados',ConditionController::class);
  Route::resource('admin/ubicaciones',UbicationController::class);
  Route::resource('admin/unidades',UnitController::class);
  Route::resource('admin/regiones',RegionController::class);
  Route::resource('admin/ludotecas',LudotecaController::class);
  Route::resource('admin/marimbas',MarimbaController::class);
  Route::resource('admin/oficinas',OfficeController::class);
  Route::resource('admin/bandas',BandController::class);
  Route::resource('admin/vestuarios',LockerroomController::class);
});