<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\ConcertController;
use Application\Repository\ConcertRepository;
use Psr\Container\ContainerInterface;

/**
 * Class ConcertControllerFactory
 * @package Application\Factory
 */
final class ConcertControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return ConcertController
     */
    public function __invoke(ContainerInterface $container): ConcertController
    {
        $concertRepository = $container->get(ConcertRepository::class);

        return new ConcertController($concertRepository);
    }
}