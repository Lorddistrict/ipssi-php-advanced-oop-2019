<?php
declare(strict_types=1);

namespace Application\Exception;

use LogicException;

/**
 * Class MusicianNotFoundException
 * @package Application\Exception
 */
final class MusicianNotFoundException extends LogicException
{
    /**
     * MusicianNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'Le musician n\'a pas été trouvé')
    {
        parent::__construct($message);
    }
}
