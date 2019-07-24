<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\FamilyController;
use Application\Repository\FamilyRepository;
use Psr\Container\ContainerInterface;

/**
 * Class FamilyControllerFactory
 * @package Application\Factory
 */
final class FamilyControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return FamilyController
     */
    public function __invoke(ContainerInterface $container): FamilyController
    {
        $familyRepository = $container->get(FamilyRepository::class);

        return new FamilyController($familyRepository);
    }
}