<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoInstrumentRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class InstrumentRepositoryFactory
 * @package Application\Factory
 */
final class InstrumentRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return PdoInstrumentRepository
     */
    public function __invoke(ContainerInterface $container): PdoInstrumentRepository
    {
        $dbConnection = $container->get(PDO::class);

        return new PdoInstrumentRepository($dbConnection);
    }
}