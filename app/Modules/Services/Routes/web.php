<?php

use Illuminate\Support\Facades\Route;

use App\Modules\Services\Controllers\ServiceController;

Route::get('/android-development', [ServiceController::class, 'androidDevelopment'])->name('service.android-development');
Route::get('/web-development', [ServiceController::class, 'webDevelopment'])->name('service.web-development');
Route::get('/ui-ux-design', [ServiceController::class, 'uiUxDesign'])->name('service.ui-ux-design');
Route::get('/services', [ServiceController::class, 'services'])->name('services');


?>