<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Family\AddFamily;
use Application\Repository\Family\FindAll;
use Application\Repository\Family\FindFamily;

/**
 * Interface FamilyRepository
 * @package Application\Repository
 */
interface FamilyRepository extends FindFamily, FindAll, AddFamily
{
}