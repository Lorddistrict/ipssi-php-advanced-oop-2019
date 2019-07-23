<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Musician\FindAll;
use Application\Repository\Musician\FindMusician;

/**
 * Interface MusicianRepository
 * @package Application\Repository
 */
interface MusicianRepository extends FindMusician, FindAll
{
}