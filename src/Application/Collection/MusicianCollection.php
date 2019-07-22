<?php
declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Musician;

/**
 * Class MusicianCollection
 * @package Application\Collection
 */
final class MusicianCollection
{
    /** @var Musician[] */
    private $musicians;

    /**
     * MusicianCollection constructor.
     * @param Musician[] $musicians
     */
    public function __construct(Musician ...$musicians)
    {
        $this->musicians = $musicians;
    }

    /**
     * @return Musician[]
     */
    public function getMusicians(): array
    {
        return $this->musicians;
    }

}