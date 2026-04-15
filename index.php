<?php
require_once("./Autoload.php");


use Models\Session;
use Core\Router;

$userSession = new Session();
define("USER_ID", $userSession->val());



$router = new Router();
$router->routeRequest();
