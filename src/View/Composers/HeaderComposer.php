<?php
namespace ANavallaSuiza\Adoadomin\View\Composers;

use ANavallaSuiza\Adoadomin\Contracts\Adoadomin;
use Auth;

class HeaderComposer
{
    protected $adoadomin;

    public function __construct(Adoadomin $adoadomin)
    {
        $this->adoadomin = $adoadomin;
    }

    public function compose($view)
    {
        $user = Auth::user();

        $activeModule = $this->adoadomin->activeModule();

        $hasSidebar = false;

        if (! empty($activeModule)) {
            $hasSidebar = $activeModule->hasSidebar();
        }

        $view->with([
            'hasSidebar' => $hasSidebar,
            'modules' => $this->adoadomin->modules(),
            'user' => $user
        ]);
    }
}
