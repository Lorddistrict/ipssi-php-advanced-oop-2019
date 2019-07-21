<?php
declare(strict_types=1);

namespace Controller\Musician;

use Entity\Group;
use Entity\Instrument;
use Entity\Musician;

/**
 * Class AddMusicianController
 */
class AddMusicianController
{
    /**
     * @param Group $group
     * @param Instrument $instrument
     * @param string $name
     * @param string $firstname
     * @param int $age
     * @return array|null
     */
    public function addMusician(Group $group, Instrument $instrument, string $name, string $firstname, int $age): ?array
    {
        $musician = new Musician();
        $musician->setName($name);
        $musician->setFirstname($firstname);
        $musician->setAge($age);
        $musician->setGroup($group);
        $musician->setInstrument($instrument);
    }
}