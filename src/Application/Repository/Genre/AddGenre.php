<?php
declare(strict_types=1);

namespace Application\Repository\Genre;

/**
 * Interface AddGenre
 * @package Application\Repository\Genre
 */
interface AddGenre
{
    /**
     * @param string $name
     * @return bool
     */
    public function addGenre(string $name): bool;
}