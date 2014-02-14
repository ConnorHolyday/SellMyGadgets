<?php

    class Application {

        function __construct() {
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = explode('/', rtrim($url, '/'));

            $page = empty($url[0]) ? 'index' : $url[0];
            $func = empty($url[1]) ? 'index' : $url[1];
            $controllerName = $page . 'Controller';

            $controller = new $controllerName();
            $controller->view->page = $page;

            $controllerMethod = str_replace('-', '_', $func);

            if(method_exists($controller, $controllerMethod)) {

                if(isset($url[2])) {
                    $controller->{$controllerMethod}($url[2]);
                } else {
                    $controller->{$controllerMethod}();
                }

            } else {
                header('Location: /error/page-cannot-be-found');
            }
        }
    }
