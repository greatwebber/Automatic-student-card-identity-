<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('faculties', FacultyController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('students', StudentController::class);
});
