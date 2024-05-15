<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ParamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $api, int $status)
    {
        $apiKey = $request->header('X-API-KEY');
        if ($apiKey == $api)
        {
            return $next($request);
        }else{
            return response('Access Denied',$status);
        }
    }
}
