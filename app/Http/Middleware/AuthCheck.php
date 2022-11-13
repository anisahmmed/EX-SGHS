<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('Userlog') && ($request->path() != '/Member-login')) {
            return redirect(route('member_login'))->with('fail', 'You must be logged in');
        }
        if (session()->has('Userlog') && ($request->path() == '/Member-login')) {
            return back();
        }
        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                               ->header('Pragma','no-cache')
                               ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
