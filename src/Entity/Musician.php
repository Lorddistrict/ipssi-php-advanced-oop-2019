<?php
declare(strict_types=1);

namespace Entity;

/**
 * Class Musician
 * @package Entity
 */
class Musician
{
    /** @var string $firstname */
    private $firstname;

    /** @var string $name */
    private $name;

    /** @var Instrument $instrument */
    private $instrument;

    /** @var Group $group */
    private $group;

    /**
     * Musician constructor.
     * @param string $firstname
     * @param string $name
     * @param Instrument $instrument
     * @param Group $group
     */
    public function __construct(string $firstname, string $name, Instrument $instrument, Group $group)
    {
        $this->firstname = $firstname;
        $this->name = $name;
        $this->instrument = $instrument;
        $this->group = $group;
    }

}