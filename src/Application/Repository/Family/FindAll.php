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
    public function fetchAll(): FamilyCollection;
}