<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('auth-login', [LoginController::class, 'loginAuth'])->name('login.auth');
Route::get('register', [RegistrationController::class, 'index'])->name('register');
Route::post('auth-register', [RegistrationController::class, 'registrationAuth'])->name('register.auth');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard/student', [DashboardController::class, 'updateStudentView'])->name('dashboard.update-student-view');
Route::post('dashboard/update-student', [DashboardController::class, 'updateStudent'])->name('dashboard.update-student');
Route::post('dashboard/delete-student', [DashboardController::class, 'deleteStudent'])->name('dashboard.delete-student');