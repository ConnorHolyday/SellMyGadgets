<?php

    class Application {

        function __construct() {
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = explode('/', rtrim($url, '/'));

            // if(empty($url[0])) {
            //     $controller = new IndexController();
            //     $controller->index();
            //     return false;
            // } else {
            //     $controllerName = $url[0] . 'Controller';
            // }

            $page = empty($url[0]) ? 'index' : $url[0];
            $func = empty($url[1]) ? 'index' : $url[1];
            $controllerName = $page . 'Controller';

            $controller = new $controllerName();

            $controllerFunction = str_replace('-', '_', $func);

            if(isset($url[2])) {
                $controller->{$controllerFunction}($url[2]);
            } else {
                $controller->{$controllerFunction}();
            }

        }
    }