<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Router\ParseUriHelper;
use Psr\Container\ContainerInterface;

/**
 * Class ParseUriHelperFactory
 * @package Application\Factory
 */
final class ParseUriHelperFactory
{
    /**
     * @param ContainerInterface $container
     * @return ParseUriHelper
     */
    public function __invoke(ContainerInterface $container) : ParseUriHelper
    {
        return new ParseUriStaticNameHelper();
    }
}