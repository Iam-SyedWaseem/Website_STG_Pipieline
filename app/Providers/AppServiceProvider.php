<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Seeder;
use App\Helpers\Utils;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       // $this->app->register(\App\Providers\PasswordEncryptionProvider::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        view()->share('countries', Utils::getCountryCodes());
        
        $modules = ['ContactUs','Admin','Department','Career']; // List of your modules

        foreach ($modules as $module) {
            $this->loadMigrationsFrom(app_path("Modules/{$module}/Database/Migrations"));
        }

        // Load routes for Home module
        Route::middleware('web')
            ->namespace('App\Modules\Home\Controllers')
            ->group(base_path('app/Modules/Home/Routes/web.php'));

        // Load routes for Company module
        Route::middleware('web')
            ->namespace('App\Modules\Company\Controllers')
            ->group(base_path('app/Modules/Company/Routes/web.php'));

        // Load routes for Service module
        Route::middleware('web')
            ->namespace('App\Modules\Services\Controllers')
            ->group(base_path('app/Modules/Services/Routes/web.php'));

        // Load routes for ContactUs module
        Route::middleware('web')
            ->namespace('App\Modules\ContactUs\Controllers')
            ->group(base_path('app/Modules/ContactUs/Routes/web.php'));

        // Load routes for Admin module
        Route::middleware('web')
            ->namespace('App\Modules\Admin\Controllers')
            ->group(base_path('app/Modules/Admin/Routes/web.php'));

        // Load routes for Career module
        Route::middleware('web')
        ->namespace('App\Modules\Career\Controllers')
        ->group(base_path('app/Modules/Career/Routes/web.php'));
        
          // Load routes for Seo module
          Route::middleware('web')
          ->namespace('App\Modules\Seo\Controllers')
          ->group(base_path('app/Modules/Seo/Routes/web.php'));


        // View::addNamespace('home', resource_path('/App/Modules/Home/views/home'));
        View::addNamespace('home', base_path('app/Modules/Home/Views'));
        View::addNamespace('layout', base_path('app/Modules/Layout/Views'));
        View::addNamespace('company', base_path('app/Modules/Company/Views'));
        View::addNamespace('service', base_path('app/Modules/Services/Views'));

        View::addNamespace('contactus', base_path('app/Modules/ContactUs/Views'));
        View::addNamespace('admin', base_path('app/Modules/Admin/Views'));
        View::addNamespace('adminlayout', base_path('app/Modules/AdminLayout/Views'));

        View::addNamespace('careers', base_path('app/Modules/Career/Views'));
        View::addNamespace('seopages', base_path('app/Modules/Seo/Views'));


    }

   
}
