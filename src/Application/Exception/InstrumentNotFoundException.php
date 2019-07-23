<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class InstrumentNotFoundException
 * @package Application\Exception
 */
final class InstrumentNotFoundException extends LogicException
{
    /**
     * InstrumentNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'L\'instrument n\'a pas été trouvé')
    {
        parent::__construct($message);
    }
}
