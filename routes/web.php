<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Models\Usuario;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\TrabajadorController;
use App\Http\Controllers\Admin\BienController;
use App\Http\Controllers\Admin\SedeController;

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

Route::get('/', function () {
    return view('login');
});

// routes/web.php para insertar un usuario con hash

Route::get('/fixpassword', function () {
    try {
        // ¡USA EL NUEVO MODELO!
        App\Models\Usuario::create([
            'nombre' => 'Super',    // Asegúrate que esta columna exista
            'apellido' => 'Admin', // Asegúrate que esta columna exista
            'user' => 'Admin',      // Asegúrate que esta columna exista
            'password' => Illuminate\Support\Facades\Hash::make('super2121'), 
            'rol' => 'superadmin' // Asegúrate que esta columna exista
        ]);
        return "¡NUEVO ADMIN CREADO EN LA TABLA 'USUARIOS'!";
    } catch (Exception $e) {
        return "Error al crear admin en 'usuarios': " . $e->getMessage();
    }
});

// Rutas de Login de Admin (Públicas)
Route::prefix('admin')->group(function () {
    // 1. Esta es la ruta GET que te da el error 404
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
    
    // 2. Esta es la ruta POST para cuando envías el formulario
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
    
    // 3. Esta es la ruta para el botón de "Cerrar Sesión"
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

});

// Rutas del Panel de Admin (Protegidas)
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    
    // Esta es la ruta que mostrará tu 'index' después del login
    Route::get('/dashboard', [UsuarioController::class, 'index'])->name('admin.dashboard');
    
    //USUARIOS
    Route::get('/usuarios', [UsuarioController::class, 'listado'])->name('admin.usuarios.index');

    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('admin.usuarios.store');

    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('admin.usuarios.update');
    
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');

    //SEDES
    Route::get('/sedes', [SedeController::class, 'index'])->name('admin.sedes.index');

    Route::post('/sedes', [SedeController::class, 'store'])->name('admin.sedes.store');

    Route::put('/sedes/{sede}', [SedeController::class, 'update'])->name('admin.sedes.update');

    Route::delete('/sedes/{sede}', [SedeController::class, 'destroy'])->name('admin.sedes.destroy');

    //TRABAJADORES
    Route::get('/trabajadores', [TrabajadorController::class, 'index'])->name('admin.trabajadores.index');

    Route::post('/trabajadores', [TrabajadorController::class, 'store'])->name('admin.trabajadores.store');

    Route::put('/trabajadores/{trabajador}', [TrabajadorController::class, 'update'])->name('admin.trabajadores.update');

    Route::delete('/trabajadores/{trabajador}', [TrabajadorController::class, 'destroy'])->name('admin.trabajadores.destroy');

    //BIENES
    Route::get('/bienes', [BienController::class, 'index'])->name('admin.bienes.index');

    Route::post('/bienes', [BienController::class, 'store'])->name('admin.bienes.store');

    Route::put('/bienes/{bien}', [BienController::class, 'update'])->name('admin.bienes.update');
    
});
