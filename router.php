<?php

    session_start();
    require 'configs/routes.php';
    $default_route = $routes['default'];
    $default_parts = explode('/', $default_route);
    $method = $_SERVER['REQUEST_METHOD'];
    $resource = $_REQUEST['resource'] ?? $default_parts[1];
    $action = $_REQUEST['action'] ?? $default_parts[2];
    if(!in_array($method . '/' . $resource . '/' . $action, $routes)){
        die('Hey oh n’essaie pas de jouer avec les routes !'); // changer et faire une redirection
    }

    $controllerName = 'Controller\\' . ucfirst($resource);
    $controller = new $controllerName();

    $datas = call_user_func([$controller, $action]);
