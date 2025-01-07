<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(session('lang'));
        if (!(session()->get('lang'))) {
            session()->put('lang', 'uz');
        }
        $lang = session()->get('lang');

        App::setLocale($lang);
        return $next($request);
    }
}
