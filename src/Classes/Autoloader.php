<?php
declare(strict_types=1);

namespace App\Classes;

/**
 * Class Autoloader
 */
class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    /**
     * @param string $class
     */
    public static function autoload(string $class): void
    {
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        if(file_exists($classPath)){
            include $classPath;
        }
    }
}

?>