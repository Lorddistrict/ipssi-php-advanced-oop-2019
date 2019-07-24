<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoConcertRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class ConcertRepositoryFactory
 * @package Application\Factory
 */
final class ConcertRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return PdoConcertRepository
     */
    public function __invoke(ContainerInterface $container): PdoConcertRepository
    {
        $dbConnection = $container->get(PDO::class);

        return new PdoConcertRepository($dbConnection);
    }
}