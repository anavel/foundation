<?php
namespace Anavel\Foundation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Anavel\Foundation\Http\Middleware\Authenticate;
use Anavel\Foundation\Core\Anavel;

class AnavelServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     *
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->router = $this->app->make('Illuminate\Routing\Router');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->router->middleware('anavel.auth', Authenticate::class);

        include __DIR__.'/Http/routes.php';

        $this->loadViewsFrom(__DIR__.'/../views', 'anavel');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'anavel');

        $this->publishes([
            __DIR__.'/../config/anavel.php' => config_path('anavel.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../public/bootstrap' => public_path('vendor/anavel/bootstrap'),
            __DIR__.'/../public/dist' => public_path('vendor/anavel/dist'),
            __DIR__.'/../public/plugins' => public_path('vendor/anavel/plugins')
        ], 'assets');

        $anavel = $this->app->make('Anavel\Foundation\Contracts\Anavel');
        $anavel->boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/anavel.php', 'anavel');

        $this->app->singleton(
            'Anavel\Foundation\Contracts\Anavel',
            function ($app) {
                $anavel = new Anavel($app, $this->app['router']);

                foreach (config('anavel.modules') as $module) {
                    $anavel->register($module);
                }

                return $anavel;
            }
        );

        // Force register modules
        $this->app->make('Anavel\Foundation\Contracts\Anavel');

        $this->app->register('Anavel\Foundation\Providers\ViewComposersServiceProvider');
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
