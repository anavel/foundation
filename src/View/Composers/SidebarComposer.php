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
        $menuItems = [];

        if (! empty($activeModule)) {
            $hasSidebar = $activeModule->hasSidebar();
            $menuItems = $activeModule->sidebarItems();
        }

        $view->with([
            'hasSidebar' => $hasSidebar,
            'menuItems' => $menuItems
        ]);
    }
}
