<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Group\FindAll;
use Application\Repository\Group\FindGroup;

/**
 * Interface GroupRepository
 * @package Application\Repository
 */
interface GroupRepository extends FindGroup, FindAll
{
}