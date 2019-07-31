<?php
declare(strict_types=1);

namespace Application;

use Exception;

/**
 * Class Container
 * @package Application
 */
final class Container
{
    /** @var array $config */
    private $config;

    /**
     * Container constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->config[$key]);
    }

    /**
     * @param string $key
     * @return object
     * @throws Exception
     */
    public function get(string $key): object
    {
        if (!$this->has($key)) {
            throw new Exception("Service {$key} not found");
        }
        return $this->config[$key];
    }
}