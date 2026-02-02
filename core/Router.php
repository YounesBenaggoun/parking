<?php

require("config.php");
require("functions.php");


class Router
{
    public function routeRequest()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "/";
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = trim($url, "/");
        $urlParts = explode("/", $url);
        $controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) . "Controller" : "HomeController";
        $action = !empty($urlParts[1]) ? $urlParts[1] : "index";
        $controllerFile = 'controllers/' . $controllerName . ".php";

        // show($controllerName);
        // show($action);

        if (!file_exists($controllerFile))
        {
            echo "Erreur 404 - le Controller ($controllerName) non Trouvée <br/>";
            return;
        }
        require_once($controllerFile);

        if (!class_exists($controllerName))
        {
            echo "class $controllerName non trouvée<br/>";
            return;
        }
        $controller = new $controllerName();

        if (!method_exists($controller, $action))
        {
            echo ("methode $action du controlleur $controllerName  non trouveé!<br/>");
            return;
        }

        $params = array_slice($urlParts, 2);
        $reflectionMethod = new ReflectionMethod($controller, $action);
        $methodParams = $reflectionMethod->getParameters();

        if (count($methodParams) <= 0)
        {
            $controller->$action();
            return;
        }

        if (count($params) >= count($methodParams))
        {
            call_user_func_array([$controller, $action], $params);
            return;
        }
        echo "paramètres passées en URL insuffisant \n";
    }
}
