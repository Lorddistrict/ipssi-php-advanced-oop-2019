<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Concert\FindAll;
use Application\Repository\Concert\FindConcert;

/**
 * Interface ConcertRepository
 * @package Application\Repository
 */
interface ConcertRepository extends FindConcert, FindAll
{
}