<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

/**
 * Class Instrument
 * @package Application\Entity
 */
class Instrument
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /** @var Classification */
    private $classification;

    /** @var Family */
    private $family;

    /** @var SubFamily */
    private $subFamily;

    /** @var Genre[] */
    private $genre;

    public function __construct(string $name, Classification $classification, Family $family, SubFamily $subFamily,
                                Genre $genre)
    {
        $this->name = $name;
        $this->classification = $classification;
        $this->family = $family;
        $this->subFamily = $subFamily;
        $this->genre = $genre;
    }

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
     * @return Classification
     */
    public function getClassification(): Classification
    {
        return $this->classification;
    }

    /**
     * @return Family
     */
    public function getFamily(): Family
    {
        return $this->family;
    }

    /**
     * @return SubFamily
     */
    public function getSubFamily(): SubFamily
    {
        return $this->subFamily;
    }

    /**
     * @return Genre[]
     */
    public function getGenre(): array
    {
        return $this->genre;
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