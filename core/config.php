<?php

if ($_SERVER['SERVER_NAME'] == "localhost")
{
    define("ROOT", "http://localhost/parking");
}
else
{
    define("ROOT", "http://localhost/parking");
}

define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "parking");
