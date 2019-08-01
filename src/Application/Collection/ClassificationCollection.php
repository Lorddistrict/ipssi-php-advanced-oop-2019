<?php
declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Classification;

/**
 * Class Classification
 * @package Application\Collection
 */
final class ClassificationCollection
{
    /** @var Classification[] */
    private $classifications;

    /**
     * ClassificationCollection constructor.
     * @param Classification[] $classifications
     */
    public function __construct(Classification ...$classifications)
    {
        $this->classifications = $classifications;
    }

    /**
     * @return Classification[]
     */
    public function getClassifications(): array
    {
        return $this->classifications;
    }

}