<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class InvalidDatabaseConfigurationException
 * @package Application\Exception
 */
final class InvalidDatabaseConfigurationException extends LogicException
{
    public function __construct(string $message = 'La configuration de base de donnée fournie est invalide')
    {
        parent::__construct($message);
    }
}
