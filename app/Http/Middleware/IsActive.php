<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $value = $request->session()->get('authenticatedUser');       
        if ($value == null)
        {
            return redirect('/')->withErrors(['error' => 'You are not logged in, Please login first.']);
        } 

        return $next($request);
    }
}
