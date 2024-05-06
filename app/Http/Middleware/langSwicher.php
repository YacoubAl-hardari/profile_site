<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class langSwicher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          if(session()->has('lang') && array_key_exists(session('lang'),config('app.support_langs')))
        {
            app()->setLocale(session('lang'));
        }
        return $next($request);
    }
}
