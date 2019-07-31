<?php
declare(strict_types=1);

namespace Application\Repository\Classification;

use Application\Entity\Classification;

/**
 * Interface FindClassification
 * @package Application\Repository\Classification
 */
interface FindClassification
{
    /**
     * @param string $name
     * @return Classification|null
     */
    public function findByName(string $name = ''): ?Classification;
}