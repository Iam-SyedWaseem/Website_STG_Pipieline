<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Company\Controllers\CompanyController;



Route::get('/about-us', [CompanyController::class, 'index'])->name('company.index');

?>
