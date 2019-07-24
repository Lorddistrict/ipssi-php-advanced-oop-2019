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
    public function __construct(string $message = 'Instrument not found')
    {
        parent::__construct($message);
    }
}
