<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\GenreController;
use Application\Repository\GenreRepository;
use Psr\Container\ContainerInterface;

/**
 * Class GenreControllerFactory
 * @package Application\Factory
 */
final class GenreControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return GenreController
     */
    public function __invoke(ContainerInterface $container): GenreController
    {
        $genreRepository = $container->get(GenreRepository::class);

        return new GenreController($genreRepository);
    }
}