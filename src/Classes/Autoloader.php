<?php
declare(strict_types=1);

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
        var_dump($class);die;
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        if(file_exists($classPath)){
            include $classPath;
        }
    }
}

?>