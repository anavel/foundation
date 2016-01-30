<?php
namespace Anavel\Foundation\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Anavel\Foundation\Contracts\Authenticatable;
use Closure;
use Exception;

class Authenticate
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('anavel.login'));
            }
        }

        if (! $this->auth->user() instanceof Authenticatable) {
            throw new Exception('The user model must implement the ' . Authenticatable::class . ' contract.');
        }

        if (! $this->auth->user()->isAnavelAuthorized()) {
            return redirect()
                ->guest(route('anavel.login'))
                ->withErrors([
                    'user' => trans('anavel::messages.login_authorization_missing')
                ]);
        }

        return $next($request);
    }
}
