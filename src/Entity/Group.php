<?php
declare(strict_types=1);

namespace Entity;

/**
 * Class Group
 */
class Group
{
    /** @var int $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var Concert $concert */
    private $concert;

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
     * @return Concert
     */
    public function getConcert(): Concert
    {
        return $this->concert;
    }

    /**
     * @param Concert $concert
     */
    public function setConcert(Concert $concert): void
    {
        $this->concert = $concert;
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