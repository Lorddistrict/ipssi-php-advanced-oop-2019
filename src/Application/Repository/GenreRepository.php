<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Genre\FindAll;
use Application\Repository\Genre\FindGenre;

/**
 * Interface GenreRepository
 * @package Application\Repository
 */
interface GenreRepository extends FindGenre, FindAll
{
}