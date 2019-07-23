<?php
declare(strict_types=1);

namespace Application\Repository\SubFamily;

use Application\Collection\SubFamilyCollection;

/**
 * Interface FindAll
 * @package Application\Repository\SubFamily
 */
interface FindAll
{
    public function fetchAll(): SubFamilyCollection;
}