<?php
declare(strict_types=1);

namespace Application\Repository\SubFamily;

use Application\Entity\Family;

/**
 * Interface AddSubFamily
 * @package Application\Repository\SubFamily
 */
interface AddSubFamily
{
    /**
     * @param string $name
     * @param Family $family
     * @return bool
     */
    public function addSubFamily(string $name, Family $family): bool;
}