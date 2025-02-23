<?php

namespace Cpuch\LaravelFlowbite;

use Illuminate\Support\Facades\Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Publishing the config.
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-flowbite.php'),
            ], 'laravel-flowbite-config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-flowbite'),
            ], 'laravel-flowbite-views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../assets' => public_path('vendor/laravel-flowbite'),
            ], 'laravel-flowbite-assets');
        }

        $this->registerViews();
        $this->registerBladeComponents();
        $this->registerBladeDirectives();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-flowbite');
    }

    /**
     * Register views.
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-flowbite');
    }

    /**
     * Register Blade components.
     */
    public function registerBladeComponents()
    {
        Blade::componentNamespace('Cpuch\LaravelFlowbite\View\Components', 'laravel-flowbite');
    }

    /**
     * Register Blade directives.
     */
    public function registerBladeDirectives()
    {
        Blade::directive('flowbiteStyle', function ($expression) {
            return "<?php echo '<link href=\"https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css\" rel=\"stylesheet\" />'; ?>";
        });

        Blade::directive('flowbiteScript', function ($expression) {
            return "<?php echo '<script src=\"https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js\"></script>'; ?>";
        });

        Blade::directive('flowbiteComponentsStyle', function ($expression) {
            return "<?php echo '<link href=' . asset('vendor/laravel-flowbite/css/components.css') . ' rel=\"stylesheet\" />'; ?>";
        });
    }
}
