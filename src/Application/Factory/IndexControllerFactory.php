<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\IndexController;
use Application\Repository\ConcertRepository;
use Psr\Container\ContainerInterface;

/**
 * Class IndexControllerFactory
 * @package Application\Factory
 */
final class IndexControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return IndexController
     */
    public function __invoke(ContainerInterface $container) : IndexController
    {
        $concertRepository = $container->get(ConcertRepository::class);
        return new IndexController($concertRepository);
    }
}