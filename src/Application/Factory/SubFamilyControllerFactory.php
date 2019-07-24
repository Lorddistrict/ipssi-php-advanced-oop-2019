<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\SubFamilyController;
use Application\Repository\SubFamilyRepository;
use Psr\Container\ContainerInterface;

/**
 * Class SubFamilyControllerFactory
 * @package Application\Factory
 */
final class SubFamilyControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return SubFamilyController
     */
    public function __invoke(ContainerInterface $container): SubFamilyController
    {
        $subFamilyRepository = $container->get(SubFamilyRepository::class);

        return new SubFamilyController($subFamilyRepository);
    }
}