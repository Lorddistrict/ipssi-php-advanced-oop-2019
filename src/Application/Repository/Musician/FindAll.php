<?php
declare(strict_types=1);

namespace Application\Repository\Musician;

use Application\Collection\MusicianCollection;

/**
 * Interface FindAll
 * @package Application\Repository\Musician
 */
interface FindAll
{
    public function fetchAll(): MusicianCollection;
}