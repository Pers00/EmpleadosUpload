<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PuestoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadoImageController;
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
    return view('admin.index');
});

Route::resource('puesto', PuestoController::class);
Route::resource('departamento', DepartamentoController::class);
Route::resource('empleado', EmpleadoController::class);


//delete y no get para borrarlo con action (modal)
Route::delete('puesto/flush/all', [PuestoController::class, 'flush'])->name('puesto.flush');


Route::delete('departamento/flush/all', [DepartamentoController::class, 'flush'])->name('departamento.flush');


Route::delete('empleado/flush/all', [EmpleadoController::class, 'flush'])->name('empleado.flush');

Route::delete('empleado/{puesto}/flush', [EmpleadoController::class, 'destroyPuestos'])->name('destroyPuestos.flush');

Route::delete('empleado/{departamento}/flushDepartments', [EmpleadoController::class, 'destroyDepartamentos'])->name('destroyDepartamentos.flushDepartments');

// borrar en show de employment
Route::delete('empleado/{empleado}/{puesto}/destroyShow', [EmpleadoController::class, 'destroyShow'])->name('destroyShow.flush');

Route::delete('empleado/{empleado}/{departamento}/destroyShowDepartment', [EmpleadoController::class, 'destroyShowDepartment'])->name('destroyShowDepartment.flush');



Route::delete('empleado/{empleado}/destroyImage', [EmpleadoController::class, 'destroyImage'])->name('destroyImage');