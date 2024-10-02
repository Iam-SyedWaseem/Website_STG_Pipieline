<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class BladeDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
       
        // Mobile directive
Blade::directive('mobile', function () {
    return "<?php if (isset(\$_SERVER['HTTP_USER_AGENT']) && strpos(\$_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false): ?>";
});

// End mobile directive
Blade::directive('endmobile', function () {
    return "<?php endif; ?>";
});

// Desktop directive
Blade::directive('desktop', function () {
    return "<?php if (isset(\$_SERVER['HTTP_USER_AGENT']) && strpos(\$_SERVER['HTTP_USER_AGENT'], 'Mobile') === false): ?>";
});

// End desktop directive
Blade::directive('enddesktop', function () {
    return "<?php endif; ?>";
});

    }
}
