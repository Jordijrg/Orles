<?php

use Emeset\Middleware;

/**
 * @deprecated Will be removed in version 1.0, use Emeset\Middleware::next() instead
 * @param $request
 * @param $response
 * @param $container
 * @param $next
 * @return mixed
 */
function nextMiddleware($request, $response, $container, $next)
{
    return Middleware::next($request, $response, $container, $next);
}