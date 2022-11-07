<?php

function nextMiddleware($request, $response, $container, $next)
{
    if (is_array($next)) {
        if (count($next) > 1) {
            $call = array_shift($next);
            //echo $call. " ";
            $response = $call($request, $response, $container, $next);
        } else {
            $response = call_user_func($next[0], $request, $response, $container);
        }
    } else {
        $response = call_user_func($next, $request, $response, $container);
    }

    return $response;
}
