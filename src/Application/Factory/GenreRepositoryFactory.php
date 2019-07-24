<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoGenreRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class GenreRepositoryFactory
 * @package Application\Factory
 */
final class GenreRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return PdoGenreRepository
     */
    public function __invoke(ContainerInterface $container): PdoGenreRepository
    {
        $dbConnection = $container->get(PDO::class);

        return new PdoGenreRepository($dbConnection);
    }
}