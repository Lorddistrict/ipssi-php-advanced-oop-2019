<?php
declare(strict_types=1);

namespace Application\Repository\Instrument;

use Application\Entity\Instrument;

/**
 * Interface FindGroup
 * @package Application\Repository\Instrument
 */
interface FindInstrument
{
    public function findByName(string $name = ''): ?Instrument;
}