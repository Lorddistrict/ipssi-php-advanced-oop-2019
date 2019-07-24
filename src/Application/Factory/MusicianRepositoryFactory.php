<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoMusicianRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class MusicianRepositoryFactory
 * @package Application\Factory
 */
final class MusicianRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return PdoMusicianRepository
     */
    public function __invoke(ContainerInterface $container): PdoMusicianRepository
    {
        $dbConnection = $container->get(PDO::class);

        return new PdoMusicianRepository($dbConnection);
    }
}