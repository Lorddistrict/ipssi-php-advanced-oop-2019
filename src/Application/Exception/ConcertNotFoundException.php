<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class ConcertNotFoundException
 * @package Application\Exception
 */
final class ConcertNotFoundException extends LogicException
{
    /**
     * ConcertNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'Le concert n\'a pas été trouvé')
    {
        parent::__construct($message);
    }
}
