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
    public function __construct(string $message = 'Le group n\'a pas été trouvé')
    {
        parent::__construct($message);
    }
}
