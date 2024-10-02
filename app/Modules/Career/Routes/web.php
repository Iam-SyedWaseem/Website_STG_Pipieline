<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Career\Controllers\CareerController;
use App\Modules\Career\Controllers\JobController;

Route::resource('jobposts', JobController::class);

Route::get('/careers',[CareerController::class,'careers'])->name('careers');
Route::get('/life-at-crystawall',[CareerController::class,'lifeatcrystawall'])->name('life-at-crystawall');

Route::get('/careers/job-details',[CareerController::class,'job_details'])->name('job-details');
Route::post('/apply', [CareerController::class, 'applysubmitForm'])->name('apply');

Route::get('/careers/job-detail',[CareerController::class,'job_details'])->name('career-job-details');

Route::get('/job-applications',[CareerController::class,'jobApplications'])->name('job-applications');

Route::post('/application/{id}/toggle-status', [CareerController::class, 'toggleStatus'])->name('application.toggleStatus');
Route::post('/application/{id}/getDetails', [CareerController::class, 'getDetails'])->name('application.getdetails');

Route::delete('/applicationdelete/{id}', [CareerController::class, 'applicationdelete'])->name('application.destroy');


?>
