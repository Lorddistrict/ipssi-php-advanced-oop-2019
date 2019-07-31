<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

/**
 * Class Classification
 * @package Application\Entity
 */
class Classification
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /**
     * Classification constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
     * @param string $name
     * @return bool
     */
    public function is(string $name): bool
    {
        return $name === $this->getName();
    }

}