<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Collection\MusicianCollection;
use Application\Helper\SlugifyHelper;

/**
 * Class Group
 * @package Application\Entity
 */
class Group
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /** @var MusicianCollection */
    private $musicians;

    /**
     * Group constructor.
     * @param string $name
     * @param MusicianCollection $musicians
     */
    public function __construct(string $name, MusicianCollection $musicians)
    {
        $this->name = $name;
        $this->musicians = $musicians;
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
     * @return MusicianCollection
     */
    public function getMusicians(): MusicianCollection
    {
        return $this->musicians;
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