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

    /** @var Group */
    private $group;

    /**
     * Musician constructor.
     * @param string $name
     * @param string $firstname
     * @param int $age
     * @param Group $group
     */
    public function __construct(string $name, string $firstname, int $age, string $email, Group $group)
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->age = $age;
        $this->email = $email;
        $this->group = $group;
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
     * @return Group
     */
    public function getGroup(): Group
    {
        return $this->group;
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