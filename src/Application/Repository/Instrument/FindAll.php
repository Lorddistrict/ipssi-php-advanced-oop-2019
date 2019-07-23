<?php
declare(strict_types=1);

namespace Application\Repository\Instrument;

use Application\Collection\InstrumentCollection;

/**
 * Interface FindAll
 * @package Application\Repository\Instrument
 */
interface FindAll
{
    public function fetchAll(): InstrumentCollection;
}