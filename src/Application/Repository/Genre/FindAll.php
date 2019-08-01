<?php
declare(strict_types=1);

namespace Application\Repository\Genre;

use Application\Collection\GenreCollection;

/**
 * Interface FindAll
 * @package Application\Repository\Genre
 */
interface FindAll
{
    /**
     * @return GenreCollection
     */
    public function fetchAll(): GenreCollection;
}