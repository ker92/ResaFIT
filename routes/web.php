<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminQrController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/mentions-legales', fn() => view('mentions-legales'))->name('mentions-legales');
Route::get('/confidentialite',  fn() => view('confidentialite'))->name('confidentialite');
Route::get('/cgu',              fn() => view('cgu'))->name('cgu');

Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password',        [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password',       [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password',        [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard',       [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/user/qrcode',          [QrCodeController::class, 'generate'])->name('user.qr.generate');
    Route::get('/user/mes-cours',       [UserController::class, 'mesCours'])->name('user.mes-cours');
    Route::get('/reservations',         [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create',  [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations',        [ReservationController::class, 'store'])->name('reservations.store');
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/courses',              [CourseController::class, 'index'])->name('courses.index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',                                    [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/qr/validate/{token}',                          [AdminQrController::class, 'validateQr'])->name('qr.validate');
    Route::match(['get', 'post'], '/reservation/{id}/validate', [AdminController::class, 'validateReservation'])->name('reservation.validate');
    Route::match(['get', 'post'], '/reservation/{id}/reject',   [AdminController::class, 'rejectReservation'])->name('reservation.reject');
    Route::delete('/reservation/{id}',                          [AdminController::class, 'deleteReservation'])->name('reservation.delete');
    Route::get('/courses/create',                               [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses',                                     [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}/edit',                            [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{id}',                                 [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}',                              [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('/users',                                        [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}',                                   [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{id}',                                [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::get('/gyms',                                         [GymController::class, 'index'])->name('gyms.index');
    Route::get('/gyms/create',                                  [GymController::class, 'create'])->name('gyms.create');
    Route::post('/gyms',                                        [GymController::class, 'store'])->name('gyms.store');
    Route::delete('/gyms/{id}',                                 [GymController::class, 'destroy'])->name('gyms.destroy');
});
