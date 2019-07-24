<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class FamilyNotFoundException
 * @package Application\Exception
 */
final class FamilyNotFoundException extends LogicException
{
    /**
     * FamilyNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'Family not found')
    {
        parent::__construct($message);
    }
}
