<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Instrument\AddInstrument;
use Application\Repository\Instrument\FindAll;
use Application\Repository\Instrument\FindInstrument;

/**
 * Interface InstrumentRepository
 * @package Application\Repository
 */
interface InstrumentRepository extends FindInstrument, FindAll, AddInstrument
{
}