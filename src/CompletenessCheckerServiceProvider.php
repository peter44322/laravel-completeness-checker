<?php

namespace Peterzaccha\CompletenessChecker;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CompletenessCheckerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/completeness-checker.php' => config_path('completeness-checker.php'),
        ], 'config');

        Blade::directive('completed', function($completed) {
            if ($completed){
                return config('completeness-checker.completedSign');
            }
            return config('completeness-checker.uncompletedSign');
        });
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
