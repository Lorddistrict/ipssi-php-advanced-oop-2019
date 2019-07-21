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

}