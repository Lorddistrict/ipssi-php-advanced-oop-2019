<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

/**
 * Class Musician
 * @package Application\Entity
 */
class Musician
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /** @var string */
    private $firstname;

    /** @var int */
    private $age;

    /** @var Instrument */
    private $instrument;

    /**
     * Musician constructor.
     * @param string $name
     * @param string $firstname
     * @param int $age
     * @param Instrument $instrument
     */
    public function __construct(string $name, string $firstname, int $age, Instrument $instrument)
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->age = $age;
        $this->instrument = $instrument;
    }

    /**
     * @return string
     */
    public function slugifiedIdentity(): string
    {
        return $this->slugify($this->getFirstname() . $this->getName());
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return Instrument
     */
    public function getInstrument(): Instrument
    {
        return $this->instrument;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function is(string $name): bool
    {
        return $name === $this->getName();
    }
}