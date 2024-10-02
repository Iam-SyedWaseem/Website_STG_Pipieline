<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

require base_path('app/Modules/Home/Routes/web.php');
require base_path('app/Modules/Company/Routes/web.php');
require base_path('app/Modules/Services/Routes/web.php');
require base_path('app/Modules/Admin/Routes/web.php');
require base_path('app/Modules/Career/Routes/web.php');

// Fallback route to handle unknown URLs
Route::fallback(function () {
    return redirect('/');
});
