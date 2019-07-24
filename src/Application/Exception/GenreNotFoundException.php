<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class GenreNotFoundException
 * @package Application\Exception
 */
final class GenreNotFoundException extends LogicException
{
    /**
     * GenreNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'Genre not found')
    {
        parent::__construct($message);
    }
}
