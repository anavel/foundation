<?php
namespace ANavallaSuiza\Adoadomin\View\Composers;

use ANavallaSuiza\Adoadomin\Contracts\Adoadomin;

class SidebarComposer
{
    protected $adoadomin;

    public function __construct(Adoadomin $adoadomin)
    {
        $this->adoadomin = $adoadomin;
    }

    public function compose($view)
    {
        $activeModule = $this->adoadomin->activeModule();

        $hasSidebar = false;
        $sidebarMenu = null;

        if (! empty($activeModule)) {
            $hasSidebar = $activeModule->hasSidebar();
            $sidebarMenu = $activeModule->sidebarMenu();
        }

        $view->with([
            'hasSidebar' => $hasSidebar,
            'sidebarMenu' => $sidebarMenu
        ]);
    }
}
