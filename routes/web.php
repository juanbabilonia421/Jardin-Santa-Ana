<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// Importar controladores del panel admin
use App\Http\Controllers\Admin\Index;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\VentaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web de tu aplicación.
|
*/

// Página principal
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rutas base
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adminlayout', fn() => view('layouts.admin'));
Route::get('/dash', fn() => view('admin.index'));

/* ==========================
   GRUPO DE RUTAS ADMIN
   ========================== */
Route::group([
    'middleware' => ['auth', 'role:SuperAdmin|Admin|Manager', 'permission:AdminPanel access'],
    'prefix'     => 'admin',
    'as'         => 'admin.'
], function () {
    // Panel principal
    Route::get('/', [Index::class, 'index'])->name('dashboard');

    // Gestión de perfiles
    Route::resource('profile', ProfileController::class);
    Route::patch('profile/{user}/passUpdate', [ProfileController::class, 'passUpdate'])->name('profile.passUpdate');
    Route::patch('profile/{user}/othersUpdate', [ProfileController::class, 'othersUpdate'])->name('profile.othersUpdate');

    // Roles y permisos
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    // Usuarios
    Route::resource('users', UserController::class);
    Route::patch('users/{user}/passUpdate', [UserController::class, 'passUpdate'])->name('users.passUpdate');
    Route::patch('users/{user}/othersUpdate', [UserController::class, 'othersUpdate'])->name('users.othersUpdate');

    // ✅ Ventas (OPTIMIZADO: solo los métodos necesarios)
    Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::post('ventas', [VentaController::class, 'store'])->name('ventas.store');
    Route::delete('ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');
    // Route::get('ventas/create', [VentaController::class, 'create'])->name('ventas.create'); // Descomentar si usas formulario separado
    // Route::put('ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update'); // Descomentar para edición
});

/* ==========================
   VERIFICACIÓN DE EMAIL
   ========================== */
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
