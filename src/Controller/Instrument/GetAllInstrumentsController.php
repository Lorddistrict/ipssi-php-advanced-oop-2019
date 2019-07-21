<?php
declare(strict_types=1);

namespace Controller\Instrument;

use Classes\CallAPI;

class GetAllInstrumentsController
{
    public function getAllInstruments(CallAPI $callAPI): array
    {
        $instruments = 'instruments';
        $url = 'http://51.77.221.45:8090/api/' . $instruments;

        $get_data = $callAPI->callAPI('GET', $url, false);
        $response = json_decode($get_data, true)['hydra:member'];

        return $response;
    }
}