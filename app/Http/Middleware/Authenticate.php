<?php

namespace App\Http\Middleware;

use RealRashid\SweetAlert\Facades\Alert;
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
        // dd($request);
        if (request()->route()->getName() == "checkout") {
            Alert::warning('Login as Customer', 'Log in Or Register as Customer');

            return route('home');
        };

        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
