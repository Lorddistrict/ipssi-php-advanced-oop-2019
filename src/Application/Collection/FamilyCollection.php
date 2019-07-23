<?php
declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Family;

/**
 * Class FamilyCollection
 * @package Application\Collection
 */
final class FamilyCollection
{
    /** @var Family[] */
    private $families;

    /**
     * FamilyCollection constructor.
     * @param Family[] $families
     */
    public function __construct(array ...$families)
    {
        $this->families = $families;
    }

    /**
     * @return Family[]
     */
    public function getFamilies(): array
    {
        return $this->families;
    }

}