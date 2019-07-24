<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class GroupNotFoundException
 * @package Application\Exception
 */
final class GroupNotFoundException extends LogicException
{
    /**
     * GroupNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'Group not found')
    {
        parent::__construct($message);
    }
}
