<?php

class Autoload
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'load']);
    }

    public static function load($className)
    {
        $baseDir = __DIR__ . "/";
        $directories = [
            "models/",
            // "views/",
            "controllers/",
            "core/",
            ""
        ];
        foreach ($directories as $directory)
        {
            $file = $baseDir . $directory . $className . ".php";
            if (file_exists($file))
            {
                include $file;
                return;
            }
        }
    }
}

Autoload::register();
