<?php
declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Genre;

/**
 * Class GenreCollection
 * @package Application\Collection
 */
final class GenreCollection
{
    /** @var Genre[] */
    private $genres;

    /**
     * GenreCollection constructor.
     * @param Genre[] $genres
     */
    public function __construct(array ...$genres)
    {
        $this->genres = $genres;
    }


    /**
     * @return Genre[]
     */
    public function getGenres(): array
    {
        return $this->genres;
    }


}