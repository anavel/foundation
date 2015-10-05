<?php
namespace ANavallaSuiza\Adoadomin\Foundation;

use ANavallaSuiza\Adoadomin\Contracts\Adoadomin as AdoadominContact;
use Illuminate\Container\Container;
use Illuminate\Contracts\Foundation\Application;
use ANavallaSuiza\Adoadomin\Support\ModuleProvider;

class Adoadomin extends Container implements AdoadominContact
{
    protected $app;

    protected $moduleProviders = array();

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function boot()
    {
        array_walk($this->moduleProviders, function($p) {
            $this->bootProvider($p);
        });
    }

    public function register($provider)
    {
        if (is_string($provider)) {
            $provider = $this->resolveProviderClass($provider);
        }

        $provider->register();

        $this->markAsRegistered($provider);

        return $provider;
    }

    public function resolveProviderClass($provider)
    {
        return new $provider($this->app);
    }

    protected function markAsRegistered($provider)
    {
        $this->moduleProviders[] = $provider;
    }

    protected function bootProvider(ModuleProvider $provider)
    {
        if (method_exists($provider, 'boot')) {
            return $this->call([$provider, 'boot']);
        }
    }

    public function modules()
    {
        return $this->moduleProviders;
    }

    public function activeModule()
    {
        return null;
    }
}
