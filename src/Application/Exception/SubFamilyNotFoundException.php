<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class SubFamilyNotFoundException
 * @package Application\Exception
 */
final class SubFamilyNotFoundException extends LogicException
{
    /**
     * SubFamilyNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'SubFamily not found')
    {
        parent::__construct($message);
    }
}
