<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoSeguroController;
use App\Http\Controllers\TipoAnalisis2Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\LandingPageController;

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
    Route::get('tiposeguro',[TipoSeguroController::class, 'index'])->name('tiposeguro.index');
    Route::post('tiposeguro', [TipoSeguroController::class, 'store'])->name('tiposeguro.store');
    Route::get('tiposeguro/{tiposeguro}', [TipoSeguroController::class, 'edit'])->name('tiposeguro.edit');
    Route::put('tiposeguro/{tiposeguro}', [TipoSeguroController::class, 'update'])->name('tiposeguro.update');
    Route::delete('tiposeguro/{tiposeguro}', [TipoSeguroController::class, 'destroy'])->name('tiposeguro.destroy');


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


    /* ------------------------------------- VISTA ESPECIALIDADES ----------------------------------------------------------- */
Route::resource('/VistaEspecialidades', EspecialidadController::class)->names('especialidad');
/* ---------------------------------------------------------------------------------------------------------------------- */

/* ------------------------------------- VISTA ESPECIALIDADES ---------------------------------------------------------- */
Route::resource('/VistaRecepcionistas', RecepcionistaController::class)->names('recepcionistas');
/* ---------------------------------------------------------------------------------------------------------------------- */


});


// rutas landing page
Route::get('/landingpage',[LandingPageController::class, 'index'])->name('LandingPage.index');
Route::get('/landingpage/solicitud',[LandingPageController::class, 'solicitud'])->name('LandingPage.solicitud');
Route::get('/landingpage/comentarios',[LandingPageController::class, 'comentarios'])->name('LandingPage.comentarios');
Route::get('landingpage/aboutUs', [LandingPageController::class, 'aboutUs'])->name('LandingPage.aboutUs');
Route::get('landingpage/contactUs', [LandingPageController::class, 'contactUs'])->name('LandingPage.contactUs');
Route::delete('/landingpage/comentarios/{comentario}', [LandingPageController::class, 'destroy'])->name('LandingPage.comentarios.destroy');
Route::post('/landingpage/comentarios', [LandingPageController::class, 'store'])->name('LandingPage.comentarios.store');




