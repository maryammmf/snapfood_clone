<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->is('panel_seller/*')){
            return route('seller.login.show');
        }
        return route('login.show');
//        return $request->expectsJson() ? null : route('login.show');
//        return $request->expectsJson() ? null : route('seller.login.show');

    }
}
