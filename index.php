<?php
require_once("./Autoload.php");

$userSession = new Session();
define("USER_ID", $userSession->val());



$router = new Router();
$router->routeRequest();



