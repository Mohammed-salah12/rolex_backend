<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

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
            $guard = $this->getGuardName($request);
            return route('login', ['guard' => $guard]);
        }
    }

    protected function getGuardName($request)
    {
        return $request->expectsJson()
            ? null
            : $request->route('guard') ?? 'web';
    }
}
