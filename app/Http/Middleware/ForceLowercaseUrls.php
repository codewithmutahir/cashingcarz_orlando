<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceLowercaseUrls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle($request, Closure $next)
{
    $uri = $request->getRequestUri();
    $lowerUri = strtolower($uri);

    if ($uri !== $lowerUri) {
        return redirect($lowerUri, 301);
    }

    return $next($request);
}

}
