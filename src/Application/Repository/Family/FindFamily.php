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
    /**
     * @param int $id
     * @return Family|null
     */
    public function findById(int $id): ?Family;

    /**
     * @param string $name
     * @return Family|null
     */
    public function findByName(string $name = ''): ?Family;
}