<?php
declare(strict_types=1);

namespace Entity;

/**
 * Class SubFamily
 * @package Entity
 */
class SubFamily
{
    /** @var int $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var Family $family */
    private $family;

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


}