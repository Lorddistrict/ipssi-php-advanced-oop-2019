<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\InstrumentController;
use Application\Repository\InstrumentRepository;
use Psr\Container\ContainerInterface;

/**
 * Class InstrumentControllerFactory
 * @package Application\Factory
 */
final class InstrumentControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return InstrumentController
     */
    public function __invoke(ContainerInterface $container): InstrumentController
    {
        $instrumentRepository = $container->get(InstrumentRepository::class);

        return new InstrumentController($instrumentRepository);
    }
}