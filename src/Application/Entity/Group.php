<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

/**
 * Class Group
 * @package Application\Entity
 */
class Group
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /** @var Concert */
    private $concert;

    /**
     * Group constructor.
     * @param string $name
     * @param Concert $concert
     */
    public function __construct(string $name, Concert $concert)
    {
        $this->name = $name;
        $this->concert = $concert;
    }

    /**
     * @return string
     */
    public function slugifiedName(): string
    {
        return $this->slugify($this->getName());
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Concert
     */
    public function getConcert(): Concert
    {
        return $this->concert;
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