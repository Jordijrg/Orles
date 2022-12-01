<?php

namespace Emeset;

class Env {

    static public function get($key, $default = null) {
        $value = $default;
        if (isset($_ENV[$key])) {
            $value = $_ENV[$key];
        }
        return $value;
    }

}