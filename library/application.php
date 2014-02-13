<?php

    class Application {

        function __construct() {
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = explode('/', rtrim($url, '/'));

            if(empty($url[0])) {
                $controller = new IndexController();
                return false;
            } else {
                $controllerName = $url[0] . 'Controller';
            }

            $controller = new $controllerName;

            if(isset($url[1])) {

                $controllerFunction = str_replace('-', '_', $url[1]);

                if(isset($url[2])) {
                    $controller->{$controllerFunction}($url[2]);
                } else {
                    $controller->{$controllerFunction}();
                }
            }
        }

    }