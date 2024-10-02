<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Seo\Controllers\PageController;

//Route::get('/seo-page',[PageController::class,'page'])->name('seo-page')->middleware('auth');

Route::resource('pages', PageController::class)->middleware('auth');

?>