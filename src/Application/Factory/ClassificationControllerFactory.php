<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\ClassificationController;
use Application\Repository\ClassificationRepository;
use Psr\Container\ContainerInterface;

/**
 * Class ClassificationControllerFactory
 * @package Application\Factory
 */
final class ClassificationControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return ClassificationController
     */
    public function __invoke(ContainerInterface $container): ClassificationController
    {
        $classificationRepository = $container->get(ClassificationRepository::class);

        return new ClassificationController($classificationRepository);
    }
}