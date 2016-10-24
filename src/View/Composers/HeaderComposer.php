<?php

namespace Anavel\Foundation\View\Composers;

use Anavel\Foundation\Contracts\Anavel;
use Auth;

class HeaderComposer
{
    protected $anavel;

    public function __construct(Anavel $anavel)
    {
        $this->anavel = $anavel;
    }

    public function compose($view)
    {
        $user = Auth::user();

        $activeModule = $this->anavel->activeModule();

        $hasSidebar = false;

        if (!empty($activeModule)) {
            $hasSidebar = $activeModule->hasSidebar();
        }

        $view->with([
            'hasSidebar' => $hasSidebar,
            'modules'    => $this->anavel->modules(),
            'user'       => $user,
        ]);
    }
}
