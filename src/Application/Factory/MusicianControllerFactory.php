<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\MusicianController;
use Application\Repository\MusicianRepository;
use Psr\Container\ContainerInterface;

/**
 * Class MusicianControllerFactory
 * @package Application\Factory
 */
final class MusicianControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MusicianController
     */
    public function __invoke(ContainerInterface $container): MusicianController
    {
        $musicianRepository = $container->get(MusicianRepository::class);

        return new MusicianController($musicianRepository);
    }
}