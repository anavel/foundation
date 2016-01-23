<?php
namespace Anavel\Foundation\Support;

use Illuminate\Support\ServiceProvider;

abstract class ModuleProvider extends ServiceProvider
{
    abstract public function name();

    abstract public function mainRoute();

    abstract public function hasSidebar();

    abstract public function sidebarMenu();

    abstract public function isActive();
}
