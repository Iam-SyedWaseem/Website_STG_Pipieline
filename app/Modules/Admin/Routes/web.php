<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Controllers\AdminController;

use App\Modules\Admin\Controllers\EnquiryController;

use App\Modules\Admin\Controllers\DashboardController;
use App\Modules\Admin\Controllers\TestController;



Route::get('/login', [AdminController::class, 'index'])->name('login');

Route::post('/loginSubmit', [AdminController::class, 'loginpost'])->name('admin.loginSubmit');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


Route::get('/contact-list',[AdminController::class,'contacts'])->name('contacts')->middleware('auth');


Route::get('/enquiry/{id}', [EnquiryController::class, 'show'])->name('admin.show')->middleware('auth');
Route::post('/enquiry/{id}/reply', [EnquiryController::class, 'reply'])->name('admin.reply')->middleware('auth');

Route::get('/test-result', [TestController::class, 'showResults'])->middleware('auth');

Route::post('logout', [AdminController::class, 'logout'])->name('logout');

?>