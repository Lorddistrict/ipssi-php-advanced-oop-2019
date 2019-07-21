<?php
declare(strict_types=1);

namespace Classes;

use Entity\Instrument;

/**
 * Class DependencyInjectionContainer
 * @package Classes
 */
class DependencyInjectionContainer
{
    public function getCallAPI()
    {
        return new CallAPI();
    }
}