<?php
namespace ANavallaSuiza\Adoadomin;

use Illuminate\Support\ServiceProvider;
use ANavallaSuiza\Adoadomin\Foundation\Adoadomin;

class AdoadominServiceProvider extends ServiceProvider
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
        include __DIR__.'/Http/routes.php';

        $this->loadViewsFrom(__DIR__.'/../views', 'adoadomin');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'adoadomin');

        $this->publishes([
            __DIR__.'/../config/adoadomin.php' => config_path('adoadomin.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../public/bootstrap' => public_path('vendor/adoadomin/bootstrap'),
            __DIR__.'/../public/dist' => public_path('vendor/adoadomin/dist'),
            __DIR__.'/../public/plugins' => public_path('vendor/adoadomin/plugins')
        ], 'assets');

        $adoadomin = $this->app->make('ANavallaSuiza\Adoadomin\Contracts\Adoadomin');
        $adoadomin->boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/adoadomin.php', 'adoadomin');

        $this->app->singleton(
            'ANavallaSuiza\Adoadomin\Contracts\Adoadomin',
            function ($app) {
                $adoadomin = new Adoadomin($app, $this->app['router']);

                foreach (config('adoadomin.modules') as $module) {
                    $adoadomin->register($module);
                }

                return $adoadomin;
            }
        );

        // Force register modules
        $this->app->make('ANavallaSuiza\Adoadomin\Contracts\Adoadomin');

        $this->app->register('ANavallaSuiza\Adoadomin\Providers\ViewComposersServiceProvider');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
