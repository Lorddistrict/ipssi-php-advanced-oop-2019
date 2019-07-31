<?php
declare(strict_types=1);

namespace Application;

use Application\Router\Router;
use Zend\ServiceManager\ServiceManager;

/**
 * Class Application
 * @package Application
 */
final class Application
{
    /** @var ServiceManager $container */
    private $container;

    /** @var Router $router */
    private $router;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $config = require  __DIR__.'/../../config/application.config.php';
        $this->container = new ServiceManager($config);

        $this->router = $this->container->get(Router::class);
    }

    /**
     * @param string $requestUri
     * @return string
     * @throws \Exception
     */
    public function dispatch(string $requestUri) : string
    {
        $content = ($this->container->get($this->router->resolve($requestUri)))->indexAction();
        if (is_file(__DIR__.'/../../views/layout.phtml')) {
            ob_start();
            include __DIR__.'/../../templates/layout.phtml';
            return ob_get_clean();
        }

        return $content;
    }
}