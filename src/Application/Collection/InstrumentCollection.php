<?php
declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Instrument;

/**
 * Class InstrumentCollection
 * @package Application\Collection
 */
final class InstrumentCollection
{
    /** @var Instrument[] */
    private $instruments;

    /**
     * InstrumentCollection constructor.
     * @param Instrument[] $instruments
     */
    public function __construct(array ...$instruments)
    {
        $this->instruments = $instruments;
    }

    /**
     * @return Instrument[]
     */
    public function getInstruments(): array
    {
        return $this->instruments;
    }

}