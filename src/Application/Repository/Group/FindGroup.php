<?php
declare(strict_types=1);

namespace Application\Repository\Group;

use Application\Entity\Group;

/**
 * Interface FindGroup
 * @package Application\Repository\Group
 */
interface FindGroup
{
    public function findByName(string $name = ''): ?Group;
}