<?php

namespace Anavel\Foundation\View\Composers;

use Anavel\Foundation\Contracts\Anavel;

class SidebarComposer
{
    protected $anavel;

    public function __construct(Anavel $anavel)
    {
        $this->anavel = $anavel;
    }

    public function compose($view)
    {
        $activeModule = $this->anavel->activeModule();

        $hasSidebar = false;
        $sidebarMenu = null;

        if (!empty($activeModule)) {
            $hasSidebar = $activeModule->hasSidebar();
            $sidebarMenu = $activeModule->sidebarMenu();
        }

        $view->with([
            'hasSidebar'  => $hasSidebar,
            'sidebarMenu' => $sidebarMenu,
        ]);
    }
}
