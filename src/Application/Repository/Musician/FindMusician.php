<?php
declare(strict_types=1);

namespace Application\Repository\Musician;

use Application\Entity\Musician;

/**
 * Interface FindMusician
 * @package Application\Repository\Musician
 */
interface FindMusician
{
    public function findByEmail(string $email = ''): ?Musician;
}