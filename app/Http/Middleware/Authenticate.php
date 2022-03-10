<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Crypt;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if ($jwtCookie = $request->cookie('jwt')) {
            $jwtDecoded = JWT::decode($jwtCookie, new Key(config('app.key'), 'HS256'));
            $decryptedToken = Crypt::decrypt($jwtDecoded[0]);
            $request->headers->set('Authorization', 'Bearer ' . $decryptedToken);
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }
}
