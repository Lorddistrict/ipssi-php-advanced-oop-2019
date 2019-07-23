<?php
declare(strict_types=1);

namespace Application\Repository\SubFamily;

use Application\Entity\SubFamily;

/**
 * Interface FindSubFamily
 * @package Application\Repository\SubFamily
 */
interface FindSubFamily
{
    public function findByName(string $name = ''): ?SubFamily;
}