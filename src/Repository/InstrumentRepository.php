<?php
declare(strict_types=1);

namespace Repository;

use Classes\CallAPI;
use Entity\Instrument;

class InstrumentRepository
{
    private $instrumentRepository;

    public function __construct(CallAPI $callAPI)
    {
        $this->callAPI = $callAPI;
    }

    /**
     * @return Instrument
     */
    public function getRandomInstrument(): Instrument
    {
        $jsonData = $this->callAPI->callAPI('GET', 'http://51.77.221.45:8090/api/instruments', false);
        $allInstruments = json_decode($jsonData, true)['hydra:member'];

        $maxValue = count($allInstruments)-1;
        $randomIndex = rand (0, $maxValue);

        $instrument = $allInstruments[$randomIndex];

        $instrumentId = rand(1,12);
        $instrumentName = $instrument['name'];

        $obj = new Instrument($instrumentName);
        return $obj;
    }
}