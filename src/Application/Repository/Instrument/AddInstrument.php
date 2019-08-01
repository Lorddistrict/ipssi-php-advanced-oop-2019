<?php
declare(strict_types=1);

namespace Application\Repository\Instrument;

use Application\Entity\Classification;
use Application\Entity\Family;
use Application\Entity\SubFamily;

/**
 * Interface AddInstrument
 * @package Application\Repository\Instrument
 */
interface AddInstrument
{
    /**
     * @param string $name
     * @param Classification $classification
     * @param Family $family
     * @param SubFamily $subFamily
     * @return bool
     */
    public function addInstrument(string $name, Classification $classification, Family $family, SubFamily $subFamily): bool;
}