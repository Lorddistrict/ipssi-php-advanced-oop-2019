<?php
declare(strict_types=1);

namespace Application\Repository\Group;

use Application\Collection\GroupCollection;

/**
 * Interface FindAll
 * @package Application\Repository\Group
 */
interface FindAll
{
    public function fetchAll(): GroupCollection;
}