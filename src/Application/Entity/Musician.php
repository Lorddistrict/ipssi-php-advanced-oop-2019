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

    /** @var string */
    private $email;

    /** @var Instrument */
    private $instrument;

    /**
     * Musician constructor.
     * @param string $name
     * @param string $firstname
     * @param int $age
     * @param Instrument $instrument
     */
    public function __construct(string $name, string $firstname, int $age, string $email, Instrument $instrument)
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->age = $age;
        $this->email = $email;
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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return Instrument
     */
    public function getInstrument(): Instrument
    {
        return $this->instrument;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function is(string $email): bool
    {
        return $email === $this->getEmail();
    }
}