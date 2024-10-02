<?php
use Illuminate\Support\Facades\Route;
use App\Modules\ContactUs\Controllers\ContactUsController;


Route::get('/contact-us', [ContactUsController::class, 'contactUs'])->name('contact.contactUs');

Route::post('/contactsubmit',[ContactUsController::class,'contactSubmit'])->name('contact.contactFormSubmit');

?>