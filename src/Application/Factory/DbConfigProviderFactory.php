<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Provider\DbConfigProvider;
use Application\Provider\EnvDbConfigProvider;

/**
 * Class DbConfigProviderFactory
 * @package Application\Factory
 */
class DbConfigProviderFactory
{
    /**
     * @return DbConfigProvider
     */
    public function __invoke(): DbConfigProvider
    {
        return new EnvDbConfigProvider();
    }
}