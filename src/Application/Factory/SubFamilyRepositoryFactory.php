<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoSubFamilyRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class SubFamilyRepositoryFactory
 * @package Application\Factory
 */
final class SubFamilyRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return PdoSubFamilyRepository
     */
    public function __invoke(ContainerInterface $container): PdoSubFamilyRepository
    {
        $dbConnection = $container->get(PDO::class);

        return new PdoSubFamilyRepository($dbConnection);
    }
}