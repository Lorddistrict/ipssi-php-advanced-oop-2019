<?php
declare(strict_types=1);

namespace Application\Repository\Concert;

use Application\Entity\Concert;

/**
 * Interface FindConcert
 * @package Application\Repository\Concert
 */
interface FindConcert
{
    public function findByName(string $name = ''): ?Concert;
}