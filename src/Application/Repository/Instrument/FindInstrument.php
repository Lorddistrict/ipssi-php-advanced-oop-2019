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
    /**
     * @param int $id
     * @return Instrument|null
     */
    public function findById(int $id): ?Instrument;

    /**
     * @param string $name
     * @return Instrument|null
     */
    public function findByName(string $name = ''): ?Instrument;
}