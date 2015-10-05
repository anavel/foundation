<?php
namespace ANavallaSuiza\Adoadomin\Providers;

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
        $this->app->view->composer('adoadomin::molecules.header.default', 'ANavallaSuiza\Adoadomin\View\Composers\HeaderComposer');
        $this->app->view->composer('adoadomin::molecules.sidebar.default', 'ANavallaSuiza\Adoadomin\View\Composers\SidebarComposer');
    }
}
