<?php
declare(strict_types=1);

namespace Application\Repository\Genre;

use Application\Entity\Genre;

/**
 * Interface FindGenre
 * @package Application\Repository\Genre
 */
interface FindGenre
{
    public function findByName(string $name = ''): ?Genre;
}