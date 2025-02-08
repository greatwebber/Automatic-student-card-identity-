<?php

use App\Http\Controllers\Student\AuthController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\IDCardController;
use App\Http\Controllers\Student\PaymentController;
use App\Http\Controllers\Student\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//require __DIR__."/admin.php";
Route::prefix('admin')->group(base_path('routes/admin.php'));


Route::prefix('student')->name('student.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware(['auth:student'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
        Route::post('/payments/process', [PaymentController::class, 'processPayment'])->name('student.payments.process');

        // Bio Data Update
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('student.profile.update');

        // ID Card Update
        Route::get('/id-card', [IDCardController::class, 'edit'])->name('id-card');
        Route::post('/id-card/update', [IDCardController::class, 'update'])->name('student.id-card.update');
    });
});
