<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\SubFamily\AddSubFamily;
use Application\Repository\SubFamily\FindAll;
use Application\Repository\SubFamily\FindSubFamily;

/**
 * Interface SubFamilyRepository
 * @package Application\Repository
 */
interface SubFamilyRepository extends FindSubFamily, FindAll, AddSubFamily
{
}