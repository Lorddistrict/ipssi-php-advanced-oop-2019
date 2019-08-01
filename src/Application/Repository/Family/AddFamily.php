<?php
declare(strict_types=1);

namespace Application\Repository\Family;

use Application\Entity\Classification;

/**
 * Interface AddFamily
 * @package Application\Repository\Family
 */
interface AddFamily
{
    /**
     * @param string $name
     * @param Classification $classification
     * @return bool
     */
    public function addFamily(string $name, Classification $classification): bool;
}