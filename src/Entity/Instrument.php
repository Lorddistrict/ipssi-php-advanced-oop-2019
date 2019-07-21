<?php
declare(strict_types=1);

namespace Entity;

/**
 * Class Instrument
 * @package Entity
 */
class Instrument
{
    /** @var int $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var Classification $classification */
    private $classification;

    /** @var Family $family */
    private $family;

    /** @var SubFamily $subfamily */
    private $subfamily;

    /** @var Genre $genre */
    private $genre;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Classification
     */
    public function getClassification(): Classification
    {
        return $this->classification;
    }

    /**
     * @param Classification $classification
     */
    public function setClassification(Classification $classification): void
    {
        $this->classification = $classification;
    }

    /**
     * @return Family
     */
    public function getFamily(): Family
    {
        return $this->family;
    }

    /**
     * @param Family $family
     */
    public function setFamily(Family $family): void
    {
        $this->family = $family;
    }

    /**
     * @return SubFamily
     */
    public function getSubfamily(): SubFamily
    {
        return $this->subfamily;
    }

    /**
     * @param SubFamily $subfamily
     */
    public function setSubfamily(SubFamily $subfamily): void
    {
        $this->subfamily = $subfamily;
    }

    /**
     * @return Genre
     */
    public function getGenre(): Genre
    {
        return $this->genre;
    }

    /**
     * @param Genre $genre
     */
    public function setGenre(Genre $genre): void
    {
        $this->genre = $genre;
    }

}