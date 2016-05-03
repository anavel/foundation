<?php
namespace Anavel\Foundation\Http\Controllers;

class DefaultController extends Controller
{
    public function index()
    {
        return view(config('anavel.dashboard_view'));
    }

    public function ckeditorFileUploader()
    {

    }

    public function ckeditorFileBrowser()
    {

    }
}
