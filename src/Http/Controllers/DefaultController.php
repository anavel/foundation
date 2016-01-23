<?php
namespace Anavel\Foundation\Http\Controllers;

class DefaultController extends Controller
{
    public function index()
    {
        return view(config('anavel.dashboard_view'));
    }

    public function login()
    {
        return view('anavel::pages.login');
    }
}
