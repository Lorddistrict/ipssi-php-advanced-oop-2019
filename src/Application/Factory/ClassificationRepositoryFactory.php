<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoClassificationRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class ClassificationRepositoryFactory
 * @package Application\Factory
 */
final class ClassificationRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return PdoClassificationRepository
     */
    public function __invoke(ContainerInterface $container): PdoClassificationRepository
    {
        $dbConnection = $container->get(PDO::class);

        return new PdoClassificationRepository($dbConnection);
    }
}