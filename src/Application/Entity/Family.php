<?php
declare(strict_types=1);

namespace Application\Entity;

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

    /** @var Classification */
    private $classification;

    /**
     * Family constructor.
     * @param string $name
     * @param Classification $classification
     */
    public function __construct(string $name, Classification $classification)
    {
        $this->name = $name;
        $this->classification = $classification;
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
     * @return Classification
     */
    public function getClassification(): Classification
    {
        return $this->classification;
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