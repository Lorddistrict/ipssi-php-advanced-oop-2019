<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Collection\FamilyCollection;
use Application\Collection\SubFamilyCollection;
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

    /** @var FamilyCollection */
    private $subFamily;

    /**
     * Classification constructor.
     * @param string $name
     * @param FamilyCollection $subFamily
     */
    public function __construct(string $name, FamilyCollection $subFamily)
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
     * @return FamilyCollection
     */
    public function getSubFamily(): FamilyCollection
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