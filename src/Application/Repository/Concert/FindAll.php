<?php
declare(strict_types=1);

namespace Application\Repository\Concert;

use Application\Collection\ConcertCollection;

/**
 * Interface FindAll
 * @package Application\Repository\Concert
 */
interface FindAll
{
    public function fetchAll(): ConcertCollection;
}