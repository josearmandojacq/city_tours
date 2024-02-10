<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller): void
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method
        ];
    }
    public function get($uri, $controller): void
    {
        $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller): void
    {
        $this->add("POST", $uri, $controller);
    }

    public function delete($uri, $controller): void
    {
        $this->add("DELETE", $uri, $controller);
    }

    public function put($uri, $controller): void
    {
        $this->add("PUT", $uri, $controller);
    }

    public function patch($uri, $controller): void
    {
        $this->add("PATCH", $uri, $controller);
    }

    public function route($path, $method)
    {
       foreach ($this->routes as $route) {
           if ($route["uri"] === $path && $route["method"] === strtoupper($method)) {
               return require base_path($route["controller"]);
           }
       }

       abort();
    }
}


