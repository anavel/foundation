<?php
namespace Anavel\Foundation\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        return view(config('anavel.dashboard_view'));
    }
}
