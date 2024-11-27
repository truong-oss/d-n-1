<?php
class Router {
    public static function route($url) {
        $parts = explode('/', trim($url), '/');
        $controller = ucfirst(array_shift($parts)) . 'Controller';
        $method = array_shift($parts) ?? 'index';
        $params = $parts;

        if (class_exists($controller) && method_exists($controller, $method)) {
            call_user_func_array([new $controller, $method], $params);
        } else {
            echo "404 Not Found";
        }
    }
}

?>