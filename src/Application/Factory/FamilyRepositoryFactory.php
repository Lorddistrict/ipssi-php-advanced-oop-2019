<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoFamilyRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class FamilyRepositoryFactory
 * @package Application\Factory
 */
final class FamilyRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return PdoFamilyRepository
     */
    public function __invoke(ContainerInterface $container): PdoFamilyRepository
    {
        $dbConnection = $container->get(PDO::class);

        return new PdoFamilyRepository($dbConnection);
    }
}