<?php
namespace Anavel\Foundation\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function getLogin()
    {
        return view('anavel::pages.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($this->auth->attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $request->has('remember'))) {
            return redirect()->intended(route('anavel.dashboard'));
        }

        return redirect(route('anavel.login'))
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => trans('anavel::messages.login_error_message'),
            ]);
    }

    public function getLogout()
    {
        $this->auth->logout();

        return redirect()->guest(route('anavel.login'));
    }
}
