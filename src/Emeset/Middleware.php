<?php

function nextMiddleware($request, $response, $config, $next)
{
    if (is_array($next)) {
        if (count($next) > 1) {
            $call = array_shift($next);
            //echo $call. " ";
            $response = $call($request, $response, $config, $next);
        } else {
            $response = call_user_func($next[0], $request, $response, $config);
        }
    } else {
        $response = call_user_func($next, $request, $response, $config);
    }

    return $response;
}
