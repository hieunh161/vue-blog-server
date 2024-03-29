<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // pass request from localhost
        $domains = ['http://localhost:8080', 'http://mydomain.com'];

        if (isset($request->server()['HTTP_ORIGIN'])) {
            $origin = $request->server()['HTTP_ORIGIN'];
            if (in_array($origin, $domains)) {
                header('Access-Control-Allow-Origin: '.$origin);
                header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
            }
        }
        return $next($request);
    }
}
