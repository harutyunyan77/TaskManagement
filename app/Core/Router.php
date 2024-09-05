<?php

namespace App\Core;

class Router
{
    public function handleRequest()
    {
        
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Route based on the URI
        switch ($uri) {
            case '/':
                $this->loadController('TaskController', 'index');
                break;
            case '/tasks/create':
                $this->loadController('TaskController', 'createTask');
                break;
            case '/complete':
                 $this->loadController('TaskController', 'complete'); 
                break;
            case '/delete':
                 $this->loadController('TaskController', 'delete');  
                break;
            default:
                $this->handle404();
                break;
        }
    }

    private function loadController($controllerName, $methodName)
    {
        
        $controllerClass = "App\\Controllers\\$controllerName";

        
        if (!class_exists($controllerClass)) {
            $this->handle404();
            return;
        }

        
        $controller = new $controllerClass();

        // Check if the method exists in the controller
        if (!method_exists($controller, $methodName)) {
            $this->handle404();
            return;
        }

        // Call the method needed
        $controller->{$methodName}();
    }

    private function handle404()
    {
        header("HTTP/1.0 404 Not Found");
        echo "404 - Page not found";
    }
}

