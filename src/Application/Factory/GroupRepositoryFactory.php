<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoGroupRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class GroupRepositoryFactory
 * @package Application\Factory
 */
final class GroupRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return PdoGroupRepository
     */
    public function __invoke(ContainerInterface $container): PdoGroupRepository
    {
        $dbConnection = $container->get(PDO::class);

        return new PdoGroupRepository($dbConnection);
    }
}