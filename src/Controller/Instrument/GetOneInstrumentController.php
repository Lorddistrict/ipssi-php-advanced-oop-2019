<?php
declare(strict_types=1);

namespace Controller\Instrument;

use Entity\Instrument;

class GetOneInstrumentController
{
    public function getOneInstrument(array $instruments): array
    {
        $min = 0;
        $max = count($instruments);
        $randomNumber = rand($min, $max);

        var_dump($instruments[$randomNumber]);die;
    }
}