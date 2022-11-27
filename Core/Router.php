<?php

namespace Core;

class Router
{
    private $controller = 'Site';
    private $method = 'home';
    private $params = [];

    /**
     *
     */
    public function __construct()
    {
        $router = $this->url();

        if (file_exists('App/Controllers/' . ucfirst($router[0]) . '.php')) {
            $this->controller = $router[0];
            unset($router[0]);
        }

        $class = "\\App\\Controllers\\" . ucfirst($this->controller);
        $obj = new $class;

        if (isset($router[1]) and method_exists($class, $router[1])) {
            $this->method = $router[1];
            unset($router[1]);
        }

        $this->params = $router ? array_values($router) : '';

        call_user_func_array([$obj, $this->method], $this->params);
    }

    /**
     *
     */
    public function url()
    {
        $url = explode('/', filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
        return $url;
    }
}
