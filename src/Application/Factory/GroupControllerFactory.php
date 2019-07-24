<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\GroupController;
use Application\Repository\GroupRepository;
use Psr\Container\ContainerInterface;

/**
 * Class GroupControllerFactory
 * @package Application\Factory
 */
final class GroupControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return GroupController
     */
    public function __invoke(ContainerInterface $container): GroupController
    {
        $groupRepository = $container->get(GroupRepository::class);

        return new GroupController($groupRepository);
    }
}