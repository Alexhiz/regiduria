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
  Route::get('admin/estados-export',[ConditionController::class,'exportExcelCondition'])->name('export.estados');

  Route::resource('admin/ubicaciones',UbicationController::class);
  Route::get('admin/ubicaciones-export',[UbicationController::class,'exportExcelUbication'])->name('export.ubicaciones');

  Route::resource('admin/unidades',UnitController::class);
  Route::get('admin/unidades-export',[UnitController::class,'exportExcelUnit'])->name('export.unidades');

  Route::resource('admin/regiones',RegionController::class);
  Route::get('admin/regiones-export',[RegionController::class,'exportExcelRegion'])->name('export.regiones');

  Route::resource('admin/ludotecas',LudotecaController::class);
  Route::get('admin/ludotecas-export',[LudotecaController::class,'exportExcelLudoteca'])->name('export.ludotecas');

  Route::resource('admin/marimbas',MarimbaController::class);
  Route::get('admin/marimbas-export',[MarimbaController::class,'exportExcelMarimba'])->name('export.marimbas');

  Route::resource('admin/oficinas',OfficeController::class);
  Route::get('admin/oficinas-export',[OfficeController::class,'exportExcelOffice'])->name('export.oficinas');


  Route::resource('admin/bandas',BandController::class);
  Route::get('admin/bandas-export',[BandController::class,'exportExcelBand'])->name('export.bandas');

  Route::resource('admin/vestuarios',LockerroomController::class);
  Route::get('admin/vestuarios-export',[LockerroomController::class,'exportExcelLockerroom'])->name('export.vestuarios');

});