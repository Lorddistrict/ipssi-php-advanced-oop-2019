<?php
declare(strict_types=1);

namespace Entity;

/**
 * Class Musician
 * @package Entity
 */
class Musician
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $firstname
     */
    private $firstname;

    /**
     * @var int $age
     */
    private $age;

    /**
     * @var Instrument $instrument
     */
    private $instrument;

    /**
     * @var Group $group
     */
    private $group;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return Instrument
     */
    public function getInstrument(): Instrument
    {
        return $this->instrument;
    }

    /**
     * @param Instrument $instrument
     */
    public function setInstrument(Instrument $instrument): void
    {
        $this->instrument = $instrument;
    }

    /**
     * @return Group
     */
    public function getGroup(): Group
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup(Group $group): void
    {
        $this->group = $group;
    }


}