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
    /**
     * @param int $id
     * @return SubFamily|null
     */
    public function findById(int $id): ?SubFamily;

    /**
     * @param string $name
     * @return SubFamily|null
     */
    public function findByName(string $name = ''): ?SubFamily;
}