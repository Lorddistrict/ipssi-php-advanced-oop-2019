<?php
declare(strict_types=1);

namespace Application\Repository\Family;

use Application\Collection\FamilyCollection;

/**
 * Interface FindAll
 * @package Application\Repository\Family
 */
interface FindAll
{
    /**
     * @return FamilyCollection
     */
    public function fetchAll(): FamilyCollection;
}