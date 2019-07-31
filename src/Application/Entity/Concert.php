<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

/**
 * Class Concert
 * @package Application\Entity
 */
class Concert
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /** @var string */
    private $adress;

    /**
     * Concert constructor.
     * @param string $name
     */
    public function __construct(string $name, string $adress)
    {
        $this->name = $name;
        $this->adress = $adress;
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
     * @return string
     */
    public function getAdress(): string
    {
        return $this->adress;
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