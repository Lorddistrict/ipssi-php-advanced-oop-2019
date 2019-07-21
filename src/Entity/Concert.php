<?php
declare(strict_types=1);

namespace Entity;

/**
 * Class Concert
 */
class Concert
{
    /** @var string $name */
    private $name;

    /** @var array $groups */
    private $groups;

    /**
     * Concert constructor.
     * @param string $name
     * @param array $groups
     */
    public function __construct(string $name, array $groups)
    {
        $this->name = $name;
        $this->groups = $groups;
    }

}