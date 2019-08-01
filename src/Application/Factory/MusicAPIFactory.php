<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Service\API\MusicAPI;
use Psr\Container\ContainerInterface;

/**
 * Class MusicAPIFactory
 * @package Application\Factory
 */
final class MusicAPIFactory
{
    /**
     * @param ContainerInterface $container
     * @return MusicAPI
     */
    public function __invoke(ContainerInterface $container): MusicAPI
    {
        return new MusicAPI();
    }
}