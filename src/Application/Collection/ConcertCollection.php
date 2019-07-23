<?php
declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Concert;

/**
 * Class ConcertCollection
 * @package Application\Collection
 */
final class ConcertCollection
{
    /** @var Concert[]  */
    private $concerts;

    /**
     * ConcertCollection constructor.
     * @param Concert ...$concerts
     */
    public function __construct(array ...$concerts)
    {
        $this->concerts = $concerts;
    }

    /**
     * @return Concert[]
     */
    public function getConcerts(): array
    {
        return $this->concerts;
    }
}