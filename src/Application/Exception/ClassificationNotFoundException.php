<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class ClassificationNotFoundException
 * @package Application\Exception
 */
final class ClassificationNotFoundException extends LogicException
{
    /**
     * ClassificationNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'Classification not found')
    {
        parent::__construct($message);
    }
}
