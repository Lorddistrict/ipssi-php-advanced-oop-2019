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

    /** @var Instrument[] */
    private $instruments;

    /**
     * SubFamily constructor.
     * @param string $name
     * @param Instrument[] $instruments
     */
    public function __construct(string $name, array $instruments)
    {
        $this->name = $name;
        $this->instruments = $instruments;
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
     * @return Instrument[]
     */
    public function getInstruments(): array
    {
        return $this->instruments;
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