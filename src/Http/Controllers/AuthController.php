<?php

namespace Anavel\Foundation\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The username form input.
     *
     * @var string
     */
    protected $username = 'email';

    /**
     * Path to the login route.
     *
     * @return string
     */
    protected $loginPath;

    /**
     * Redirect after login route.
     *
     * @var string
     */
    protected $redirectPath;

    /**
     * Redirect after logout route.
     *
     * @var string
     */
    protected $redirectAfterLogout;

    /**
     * Maximum number of login attempts for delaying further attempts.
     *
     * @var int
     */
    protected $maxLoginAttempts = 5;

    /**
     * Number of seconds to delay further login attempts.
     *
     * @var int
     */
    protected $lockoutTime = 60;

    /**
     * @param Guard $guard
     *
     * @return void
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;

        $this->loginPath = route('anavel.login');
        $this->redirectPath = route('anavel.dashboard');
        $this->redirectAfterLogout = route('anavel.login');
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('anavel::pages.login');
    }
}
