<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

/**
 * Class SubFamily
 * @package Application\Entity
 */
class SubFamily
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /** @var Family */
    private $family;

    /**
     * SubFamily constructor.
     * @param int $id
     * @param string $name
     * @param Family $family
     */
    public function __construct(string $name, Family $family)
    {
        $this->name = $name;
        $this->family = $family;
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
     * @return Family
     */
    public function getFamily(): Family
    {
        return $this->family;
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