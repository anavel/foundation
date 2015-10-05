<?php
namespace ANavallaSuiza\Adoadomin\Support;

use Illuminate\Support\ServiceProvider;

abstract class ModuleProvider extends ServiceProvider
{
    abstract public function name();

    abstract public function mainRoute();

    abstract public function hasSidebar();

    abstract public function sidebarItems();
}
