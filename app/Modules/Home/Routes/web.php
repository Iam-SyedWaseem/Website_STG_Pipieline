<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Home\Controllers\HomeController;



Route::get('/', [HomeController::class, 'index'])->name('home.index');

?>