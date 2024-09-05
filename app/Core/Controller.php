<?php

namespace App\Core;

class Controller
{
    protected function render($view, $params = [])
    {
        extract($params);
        ob_start();
        include __DIR__ . "/../Views/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/../Views/layout/main.php";
    }
}

