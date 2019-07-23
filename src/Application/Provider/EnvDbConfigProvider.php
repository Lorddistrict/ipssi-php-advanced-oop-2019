<?php
declare(strict_types=1);

namespace Application\Provider;

use Application\Exception\InvalidDatabaseConfigurationException;

/**
 * Class EnvDbConfigProvider
 * @package Application\Provider
 */
final class EnvDbConfigProvider implements DbConfigProvider
{
    /** @var string */
    private $host;

    /** @var string */
    private $name;

    /** @var string */
    private $pass;

    /** @var int */
    private $port;

    /** @var string */
    private $user;

    /**
     * EnvDbConfigProvider constructor.
     */
    public function __construct()
    {
        if(!isset(
            $_ENV['LORD_DB_HOST'],
            $_ENV['LORD_DB_NAME'],
            $_ENV['LORD_DB_PASS'],
            $_ENV['LORD_DB_PORT'],
            $_ENV['LORD_DB_USER'],
        )) {
            throw new InvalidDatabaseConfigurationException(
                "La configuration de base de donnée fournie en variables d'environnement est invalide"
            );
        }

        $this->host = $_ENV['LORD_DB_HOST'];
        $this->name = $_ENV['LORD_DB_NAME'];
        $this->pass = $_ENV['LORD_DB_PASS'];
        $this->port = (int)$_ENV['LORD_DB_PPORT'];
        $this->user = $_ENV['LORD_DB_USER'];

    }

    public function host(): string
    {
        return $this->host;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function pass(): string
    {
        return $this->pass;
    }

    public function port(): int
    {
        return $this->port;
    }

    public function user(): string
    {
        return $this->user;
    }

}