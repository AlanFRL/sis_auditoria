<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoSeguroController;
use App\Http\Controllers\TipoAnalisis2Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HistorialController;
use App\Models\TipoSeguro;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function (){
    return view('welcome');
});
*/

Auth::routes();
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function (){
        return redirect()->route('home');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/tiposeguro', TipoSeguroController::class)->names('tiposeguro');


    Route::get('tipoanalisis',[TipoAnalisis2Controller::class, 'index'])->name('tipoanalisis.index');
    Route::post('tipoanalisis', [TipoAnalisis2Controller::class, 'store'])->name('tipoanalisis.store');
    Route::get('tipoanalisis/{tipoanalisis}', [TipoAnalisis2Controller::class, 'edit'])->name('tipoanalisis.edit');
    Route::put('tipoanalisis/{tipoanalisis}', [TipoAnalisis2Controller::class, 'update'])->name('tipoanalisis.update');
    Route::delete('tipoanalisis/{tipoanalisis}', [TipoAnalisis2Controller::class, 'destroy'])->name('tipoanalisis.destroy');
    //Rutas Usuario
    Route::resource('/users', UserController::class)->names('users');
    //Rutas Roles
    Route::resource('/roles', RoleController::class)->names('roles');
    //Rutas Pacientes
    Route::resource('/pacientes', PacienteController::class)->names('pacientes');
    //Rutas Historiales
    Route::resource('/historiales', HistorialController::class)->names('historiales');

});

Route::get('/landingpage', function () {
    return view('landingpage');
});




