<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Collection\SubFamilyCollection;
use Application\Helper\SlugifyHelper;

/**
 * Class Family
 * @package Application\Entity
 */
class Family
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /** @var SubFamilyCollection */
    private $subFamily;

    /**
     * Family constructor.
     * @param string $name
     * @param SubFamilyCollection $subFamily
     */
    public function __construct(string $name, SubFamilyCollection $subFamily)
    {
        $this->name = $name;
        $this->subFamily = $subFamily;
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
     * @return SubFamilyCollection
     */
    public function getSubFamily(): SubFamilyCollection
    {
        return $this->subFamily;
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