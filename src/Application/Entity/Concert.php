<?php
declare(strict_types=1);

namespace Application\Entity;

use Application\Collection\GroupCollection;
use Application\Helper\SlugifyHelper;

/**
 * Class Concert
 * @package Application\Entity
 */
class Concert
{
    use SlugifyHelper;

    /** @var string */
    private $name;

    /** @var GroupCollection */
    private $groups;

    /**
     * Concert constructor.
     * @param string $name
     * @param GroupCollection $groups
     */
    public function __construct(string $name, GroupCollection $groups)
    {
        $this->name = $name;
        $this->groups = $groups;
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
     * @return GroupCollection
     */
    public function getGroups(): GroupCollection
    {
        return $this->groups;
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