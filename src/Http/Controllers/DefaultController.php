<?php
namespace ANavallaSuiza\Adoadomin\Http\Controllers;

class DefaultController extends Controller
{
    public function index()
    {
        return view(config('adoadomin.dashboard_view'));
    }

    public function login()
    {
        return view('adoadomin::pages.login');
    }
}
