<?php
namespace Anavel\Foundation\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->view->composer('anavel::layouts.master', 'Anavel\Foundation\View\Composers\MasterLayoutComposer');
        $this->app->view->composer('anavel::molecules.header.default', 'Anavel\Foundation\View\Composers\HeaderComposer');
        $this->app->view->composer('anavel::molecules.sidebar.default', 'Anavel\Foundation\View\Composers\SidebarComposer');
    }
}
