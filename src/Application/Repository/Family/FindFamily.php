<?php
declare(strict_types=1);

namespace Application\Repository\Family;

use Application\Entity\Family;

/**
 * Interface FindFamily
 * @package Application\Repository\Family
 */
interface FindFamily
{
    public function findByName(string $name = ''): ?Family;
}