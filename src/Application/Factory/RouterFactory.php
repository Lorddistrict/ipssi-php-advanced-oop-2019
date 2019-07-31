<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Router\ParseUriHelper;
use Application\Router\Router;
use DateTimeInterface;
use Psr\Container\ContainerInterface;

/**
 * Class RouterFactory
 * @package Application\Factory
 */
final class RouterFactory
{
    /**
     * @param ContainerInterface $container
     * @return Router
     */
    public function __invoke(ContainerInterface $container): Router
    {
        return new Router(
            $container->get(ParseUriHelper::class),
            $container->get(DateTimeInterface::class)
        );
    }
}