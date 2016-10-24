<?php

namespace Anavel\Foundation\Core;

use Anavel\Foundation\Contracts\Anavel as AnavelContact;
use Anavel\Foundation\Support\ModuleProvider;
use Illuminate\Container\Container;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\Registrar as Router;

class Anavel extends Container implements AnavelContact
{
    protected $app;
    protected $router;

    protected $moduleProviders = [];

    public function __construct(Application $app, Router $router)
    {
        $this->app = $app;
        $this->router = $router;
    }

    public function boot()
    {
        array_walk($this->moduleProviders, function ($p) {
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
        if (method_exists($provider, 'routes')) {
            $this->router->group(
                ['prefix' => config('anavel.route_prefix'), 'middleware' => 'anavel.auth'],
                function () use ($provider) {
                    include $provider->routes();
                }
            );
        }

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
        foreach ($this->moduleProviders as $module) {
            if ($module->isActive()) {
                return $module;
            }
        }
    }

    public function hasModule($moduleProvider)
    {
        $hasModule = false;

        foreach ($this->moduleProviders as $module) {
            if ($module instanceof $moduleProvider) {
                $hasModule = true;
            }
        }

        return $hasModule;
    }
}
