<?php
declare(strict_types=1);

namespace Controller\Concert;

use Classes\RandomGroupName;
use Entity\Concert;

/**
 * Class AddConcertController
 */
class AddConcertController
{
    public function addConcert(RandomGroupName $randomGroupName): Concert
    {
        $concert = new Concert();
        $concert->setName($randomGroupName->generateRandomGroupName());
    }
}